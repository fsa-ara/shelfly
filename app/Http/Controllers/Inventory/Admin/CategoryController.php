<?php

namespace App\Http\Controllers\Inventory\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account\Profile;
use App\Models\Inventory\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('inventory.admin.categories', ['categories' => $this->getLocalizedCategories()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
}
