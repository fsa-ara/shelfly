<?php

namespace App\Http\Requests\Inventory\Admin;

use App\Models\Inventory\Product;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $product = $this->getProduct();

        $uniqueRule = Rule::unique('products', 'barcode');

        if ($product) $uniqueRule->ignore($product->id);

        return [
            'image' => [
                'nullable',
                'image',
                'mimes:png,webp',
                Rule::file()
                    ->extensions([
                        'png',
                        'webp',
                    ]),
            ],
            'barcode' => [
                'required',
                'regex:/^[0-9]+$/',
                Rule::string(),
                $uniqueRule,
            ],
            'brand' => [
                'required',
                Rule::string()
                    ->max(128),
            ],
            'name' => [
                'required',
                Rule::string()
                    ->max(128),
            ],
            'unit_count' => [
                'required',
                'integer',
            ],
            'measure_value' => [
                'required',
                'integer',
            ],
            'measure_unit' => [
                'required',
                Rule::in([
                    'g',
                    'mL',
                ]),
            ],
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id'),
            ],
        ];
    }

    private function getProduct(): Product|null
    {
        if (!$this->route('uuid')) return null;

        return Product::query()
            ->where('uuid', $this->route('uuid'))
            ->firstOrFail();
    }
}
