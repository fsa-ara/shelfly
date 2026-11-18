<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Admin\ProductRequest;
use App\Models\Account\Profile;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use League\Glide\Server;
use Throwable;

class ProductController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        if ($request->expectsJson()) {
            return $this->searchBy($request, 'barcode');
        }

        return view('inventory.admin.products', ['products' => Product::query()->paginate(30)]);
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

    private function searchBy(Request $request, string $option): JsonResponse
    {
        $search = $request->query('search');

        $products = Product::query()->get(['uuid', 'barcode']);

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
}
