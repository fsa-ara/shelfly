<?php

namespace App\Http\Requests\Inventory\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
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

        foreach (array_keys(config('app.supported_locales')) as $locale) {
            $rules['translations.' . $locale . '.name'] = [
                $locale === 'en_US' ? 'required' : 'nullable',
                Rule::unique('category_translations', 'name')
                    ->where('locale', $locale),
                ...$commonRules,
            ];
        }

        return $rules;
    }
}
