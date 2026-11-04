<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Admin\CategoryCreateRequest;
use App\Models\Account\Profile;
use App\Models\Inventory\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('inventory.admin.categories', ['categories' => $this->getLocalizedCategories()]);
    }

    public function add(): View
    {
        return view('inventory.admin.category-add', ['data' => $this->getLocalizationsData()]);
    }

    public function create(CategoryCreateRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $credentials = $request->validated();

        DB::transaction(function () use ($credentials) {
            $category = Category::query()->create([
                'uuid' => Str::uuid(),
            ]);

            foreach ($credentials['translations'] as $locale => $value) {
                $category->translations()->create([
                    'locale' => $locale,
                    'name' => $value['name'],
                ]);
            }
        });

        return redirect()->route('admin.categories')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/category.status.success.category_created',
                    ['name' => $credentials['translations'][$profile->locale]['name'] ?? $credentials['translations']['en_US']['name']]
                ),
            ],
        ]);
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

    public function allDelete(): RedirectResponse
    {
        Category::query()->delete();

        return redirect()->route('admin.categories')->with([
            'status' => [
                'success' => 'inventory/admin/category.status.success.categories_deleted',
            ],
        ]);
    }

    private function getLocalizedCategories(): Collection
    {
        /** @var User $user */
        $user = request()->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $categories = Category::with('translations')->get();

        foreach ($categories as $category) {
            /** @var Collection $translations */
            $translations = $category->translations;

            $categoryTranslation = $translations->firstWhere('locale', $profile->locale);
            $defaultTranslation = $translations->firstWhere('locale', 'en_US');

            $category->translation = $categoryTranslation ?? $defaultTranslation;
        }

        return $categories;
    }

    private function getLocalizationsData(): array
    {
        $data = [];

        $supportedLocales = config('app.supported_locales');

        foreach ($supportedLocales as $locale => $language) {
            $data += [
                $locale => [
                    'language' => $language,
                    'country' => array_last(explode('_', strtolower($locale))),
                ],
            ];
        }

        return $data;
    }
}
