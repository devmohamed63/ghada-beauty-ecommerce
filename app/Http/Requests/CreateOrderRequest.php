<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'min:2', 'max:255'],
            'customer_phone' => ['required', 'string', 'regex:/^01[0-2,5]{1}[0-9]{8}$/', 'max:20'],
            'governorate_id' => ['required', 'exists:governorates,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required', 'string', 'min:5', 'max:500'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['sometimes', 'in:cod,online'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'customer_name' => 'اسم العميل',
            'customer_phone' => 'رقم الهاتف',
            'governorate_id' => 'المحافظة',
            'city_id' => 'المدينة',
            'address' => 'العنوان',
            'notes' => 'ملاحظات',
            'payment_method' => 'طريقة الدفع',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'حقل :attribute مطلوب',
            'string' => 'حقل :attribute يجب أن يكون نص',
            'min' => 'حقل :attribute يجب أن يكون على الأقل :min حرف',
            'max' => 'حقل :attribute يجب ألا يتجاوز :max حرف',
            'exists' => ':attribute غير صحيح',
            'in' => ':attribute غير صحيح',
            'customer_phone.regex' => 'رقم الهاتف غير صحيح. يجب أن يبدأ بـ 01 ويحتوي على 11 رقم',
        ];
    }
}
