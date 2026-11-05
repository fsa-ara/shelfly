<?php

namespace App\Http\Requests\Inventory\Admin;

use App\Models\Inventory\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        $commonRules = [
            Rule::string()
                ->min(2)
                ->max(128),
        ];

        $rules['translations'] = [
            'required',
            'array',
            'required_array_keys:en_US',
        ];

        $category = $this->getCategory();

        foreach (array_keys(config('app.supported_locales')) as $locale) {
            $translation = $category?->translations->firstWhere('locale', $locale);

            $uniqueRule = Rule::unique('category_translations', 'name')
                ->where('locale', $locale);

            if ($translation) $uniqueRule->ignore($translation->id);

            $rules['translations.' . $locale . '.name'] = [
                $locale === 'en_US' ? 'required' : 'nullable',
                $uniqueRule,
                ...$commonRules,
            ];
        }

        return $rules;
    }

    private function getCategory(): Category|null
    {
        if (!$this->route('uuid')) return null;

        return Category::with('translations')
            ->where('uuid', $this->route('uuid'))
            ->firstOrFail();
    }
}
