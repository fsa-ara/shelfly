<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Admin\CategoryRequest;
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

    public function create(CategoryRequest $request): RedirectResponse
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
                    ['name' => $credentials['translations'][$profile->locale]['name'] ?? $credentials['translations']['en_US']['name']],
                ),
            ],
        ]);
    }

    public function edit(string $uuid): View
    {
        return view('inventory.admin.category-edit', [
            'uuid' => $uuid,
            'data' => $this->getCategoryData(),
        ]);
    }

    public function update(CategoryRequest $request, string $uuid): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $credentials = $request->validated();

        $category = Category::with('translations')
            ->where('uuid', $uuid)
            ->firstOrFail();

        foreach ($credentials['translations'] as $locale => $value) {
            $category->translations()->updateOrCreate(
                ['locale' => $locale],
                ['name' => $value['name']],
            );
        }

        return redirect()->route('admin.categories')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/category.status.success.category_updated',
                    ['name' => $credentials['translations'][$profile->locale]['name'] ?? $credentials['translations']['en_US']['name']],
                ),
            ],
        ]);
    }

    public function delete(string $uuid): RedirectResponse
    {
        /** @var User $user */
        $user = request()->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $category = Category::query()
            ->where('uuid', $uuid)
            ->firstOrFail();

        $name = $category->translations
            ->firstWhere('locale', $profile->locale)
            ?->name
            ?? $category->translations
            ->firstWhere('locale', 'en_US')
            ?->name;

        $category->delete();

        return redirect()->route('admin.categories')->with([
            'status' => [
                'success' => __(
                    'inventory/admin/category.status.success.category_deleted',
                    ['name' => $name],
                ),
            ],
        ]);
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

            $category->translation = $categoryTranslation->name ? $categoryTranslation : $defaultTranslation;
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
                    'country' => array_last(explode('_', strtolower($locale))),
                    'language' => $language,
                ],
            ];
        }

        return $data;
    }

    private function getCategoryData(): array
    {
        $data = [];

        $category = Category::with('translations')
            ->where('uuid', request()->uuid)
            ->firstOrFail();

        $translations = $category->translations->keyBy('locale');

        foreach ($translations as $locale => $infos) {
            $data += [
                $locale => [
                    'country' => array_last(explode('_', strtolower($locale))),
                    'name' => $infos['name'],
                ],
            ];
        }

        return $data;
    }
}
