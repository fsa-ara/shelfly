<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Admin\ProductRequest;
use App\Models\Account\Profile;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\User;
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
    public function index(): View
    {
        return view('inventory.admin.products', ['products' => Product::query()->get([
            'uuid',
            'barcode',
            'brand',
            'name',
            'image',
        ])]);
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function allDelete(Server $server): RedirectResponse
    {
        $images = Product::query()->pluck('image')->filter()->all();

        DB::transaction(function () {
            Product::query()->delete();
        });

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
}
