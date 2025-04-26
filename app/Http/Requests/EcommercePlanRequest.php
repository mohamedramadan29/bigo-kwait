<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcommercePlanRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
            'features' => 'nullable',
            'price' => 'required',
            'duration_days' => 'required',
            'is_active' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => ' من فضلك ادخل اسم ',
            'price.required' => ' من فضلك ادخل سعر ',
            'duration_days.required' => ' من فضلك ادخل عدد الأيام ',
            'is_active.required' => ' من فضلك ادخل حالة ',
        ];
    }
}
