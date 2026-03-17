<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'sku' => ['required', 'string', 'min:2', 'max:50'],
            'category' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'purchase_price' => ['required', 'numeric', 'min:0.01'],
            'selling_price' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) {
                    $purchasePrice = $this->input('purchase_price', 0);
                    if ($value < $purchasePrice) {
                        $fail('Selling price must be greater than or equal to purchase price.');
                    }
                }
            ],
            'stock' => ['required', 'integer', 'min:0'],
            'min_stock' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product name is required',
            'name.min' => 'Product name must be at least 3 characters',
            'name.max' => 'Product name cannot exceed 255 characters',

            'sku.required' => 'SKU is required',
            'sku.min' => 'SKU must be at least 2 characters',
            'sku.max' => 'SKU cannot exceed 50 characters',

            'category.required' => 'Please select a category',
            'unit.required' => 'Please select a unit of measurement',

            'purchase_price.required' => 'Purchase price is required',
            'purchase_price.numeric' => 'Please enter a valid number',
            'purchase_price.min' => 'Purchase price must be greater than 0',

            'selling_price.required' => 'Selling price is required',
            'selling_price.numeric' => 'Please enter a valid number',
            'selling_price.min' => 'Selling price must be greater than 0',

            'stock.required' => 'Current stock is required',
            'stock.integer' => 'Please enter a valid number',
            'stock.min' => 'Stock cannot be negative',

            'min_stock.integer' => 'Please enter a valid number',
            'min_stock.min' => 'Minimum stock cannot be negative',

            'status.required' => 'Please select product status',
        ];
    }
}
