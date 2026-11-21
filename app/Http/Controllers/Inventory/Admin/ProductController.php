<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Admin\ProductRequest;
use App\Http\Requests\Inventory\FilterRequest;
use App\Models\Account\Profile;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use League\Glide\Server;
use Throwable;

class ProductController extends Controller
{
    public function index(FilterRequest $request): View|RedirectResponse|JsonResponse
    {
        if ($request->expectsJson()) {
            return $this->searchBy('barcode');
        }

        $filters = $request->validated();

        $products = $this->getPagination($filters, 30);

        $brands = Product::query()->distinct()->orderBy('brand')->pluck('brand', 'brand');

        $productsFilter = [
            'brands' => $brands->all(),
            'categories' => $this->getLocalizedCategories(),
        ];

        if ($products->currentPage() > $products->lastPage()) {
            return redirect()->route('admin.products', [
                ...$request->query(),
                'productsFilter' => $productsFilter,
                'page' => $products->lastPage()
            ]);
        }

        return view('inventory.admin.products', [
            'products' => $products,
            'productsFilter' => $productsFilter,
        ]);
    }

    public function add(): View
    {
        return view('inventory.admin.product-add', ['categories' => $this->getLocalizedCategories()]);
    }

    public function create(ProductRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $image = $request->file('image')?->store('products', 'public');

        try {
            DB::transaction(function () use ($credentials, $image) {
                Product::query()->create([
                    'uuid' => Str::uuid(),
                    'barcode' => $credentials['barcode'],
                    'brand' => $credentials['brand'],
                    'name' => $credentials['name'],
                    'unit_count' => $credentials['unit_count'],
                    'measure_value' => $credentials['measure_value'],
                    'measure_unit' => $credentials['measure_unit'],
                    'image' => $image,
                    'category_id' => $credentials['category_id'],
                ]);
            });
        } catch (Throwable $e) {
            Storage::disk('public')->delete($image);

            throw $e;
        }

        return redirect()->route('admin.products')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/product.status.success.product_created',
                    ['name' => $credentials['name']],
                ),
            ],
        ]);
    }

    public function edit(string $uuid): View
    {
        return view('inventory.admin.product-edit', [
            'uuid' => $uuid,
            'product' => Product::query()->where('uuid', $uuid)->firstOrFail(),
            'categories' => $this->getLocalizedCategories(),
        ]);
    }

    public function update(ProductRequest $request, Server $server, string $uuid): RedirectResponse
    {
        $product = Product::query()->where('uuid', $uuid)->firstOrFail();

        $currentImage = $product->image;

        $updateImage = $this->updateImage($request, $product);

        $credentials = $request->validated();

        $product->updateOrFail([
            'barcode' => $credentials['barcode'],
            'brand' => $credentials['brand'],
            'name' => $credentials['name'],
            'unit_count' => $credentials['unit_count'],
            'measure_value' => $credentials['measure_value'],
            'measure_unit' => $credentials['measure_unit'],
            'image' => $updateImage,
            'category_id' => $credentials['category_id'],
        ]);

        if ($currentImage && (($updateImage !== $currentImage) || $request->boolean('remove_image'))) {
            Storage::disk('public')->delete($currentImage);

            $server->deleteCache($currentImage);
        }

        return redirect()->route('admin.products')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/product.status.success.product_updated',
                    ['name' => $credentials['name']],
                ),
            ],
        ]);
    }

    public function delete(Server $server, string $uuid): RedirectResponse
    {
        $product = Product::query()->where('uuid', $uuid)->firstOrFail();

        $name = $product->name;
        $image = $product->image;

        $product->delete();

        if ($image) {
            Storage::disk('public')->delete($image);

            $server->deleteCache($image);
        }

        return redirect()->route('admin.products')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/product.status.success.product_deleted',
                    ['name' => $name],
                ),
            ],
        ]);
    }

    public function allDelete(Server $server): RedirectResponse
    {
        $images = Product::query()->pluck('image')->filter()->all();

        Product::query()->delete();

        Storage::disk('public')->delete($images);

        foreach ($images as $image) {
            $server->deleteCache($image);
        }

        return redirect()->route('admin.products')->with([
            'status' => [
                'success' => 'inventory/admin/product.status.success.products_deleted',
            ],
        ]);
    }

    private function getLocalizedCategories(): array
    {
        /** @var User $user */
        $user = request()->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $data = [];

        $categories = Category::with('translations')->get();

        foreach ($categories as $category) {
            $id = $category->id;
            $categoryTranslation = $category->translations->firstWhere('locale', $profile->locale)->name;
            $defaultTranslation = $category->translations->firstWhere('locale', 'en_US')->name;

            $data += [
                $id => $categoryTranslation ?? $defaultTranslation,
            ];
        }

        asort($data, SORT_NATURAL | SORT_FLAG_CASE);

        return $data;
    }

    private function updateImage(ProductRequest $request, Product $product): string|null
    {
        $newImage = $request->file('image')?->store('products', 'public');

        if ($request->boolean('remove_image')) {
            $updateImage = null;
        } elseif ($newImage) {
            $updateImage = $newImage;
        } else {
            $updateImage = $product->image;
        }

        return $updateImage;
    }

    private function searchBy(string $option): JsonResponse
    {
        $products = Product::query()->get(['uuid', $option]);

        $products = $products->map(function ($product) {
            return [
                'url' => route('admin.product.edit', ['uuid' => $product->uuid]),
                'label' => $product->barcode,
            ];
        });

        return response()->json([
            'route-add' => route('admin.product.add'),
            'data' => $products,
        ]);
    }

    private function getPagination(array $filters, int $count): LengthAwarePaginator
    {
        $query = Product::query();

        $query->when($filters['brands'] ?? [], fn($query, $brands) => $query->whereIn('brand', $brands));

        $query->when($filters['categories'] ?? [], fn($query, $categories) => $query->whereIn('category_id', $categories));

        return $query->paginate($count)->withQueryString();
    }
}
