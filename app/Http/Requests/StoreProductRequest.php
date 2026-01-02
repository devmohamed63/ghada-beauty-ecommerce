<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Will be handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'skin_type' => ['nullable', 'in:oily,dry,combination,sensitive,all'],
            'is_featured' => ['boolean'],
            'is_best_seller' => ['boolean'],
            'is_active' => ['boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'results' => ['nullable', 'array'],
            'results.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_featured' => $this->has('is_featured'),
            'is_best_seller' => $this->has('is_best_seller'),
            'is_active' => $this->has('is_active') ? true : $this->input('is_active', true),
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'category_id' => 'الفئة',
            'name' => 'اسم المنتج',
            'slug' => 'الرابط',
            'description' => 'الوصف',
            'price' => 'السعر',
            'stock' => 'المخزون',
            'skin_type' => 'نوع البشرة',
            'is_featured' => 'مميز',
            'is_best_seller' => 'الأكثر مبيعاً',
            'is_active' => 'نشط',
            'images' => 'الصور',
            'results' => 'صور النتائج',
        ];
    }
}
