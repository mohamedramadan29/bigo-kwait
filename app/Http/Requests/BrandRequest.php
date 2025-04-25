<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BrandRequest extends FormRequest
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
        $store_id = $this->store_id;
        $rules = [
            "name" => [
                'required',
                'string',
                'max:100',
                Rule::unique('brands', 'name')
                    ->ignore($this->id)
                    ->where(function ($query) use ($store_id) {
                        return $query->where('store_id', $store_id);
                    })
            ],
            'status' => ['required', 'integer', 'in:0,1'],
        ];
        if ($this->method() == 'PUT') {
            $rules['logo'] = ['nullable', 'image', 'max:2048'];
        } else {
            $rules['logo'] = ['required', 'image', 'max:2048'];
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'name.required' => ' من فضلك ادخل اسم العلامة التجارية  ',
            'name.string' => ' من فضلك ادخل الاسم بشكل صحيح ',
            'name.unique' => 'اسم العلامة التجارية متواجد من قبل',
            'name.max' => ' عدد احرف الاسم يجب الا تتجاوز 100  حرف  ',
            'status.required' => ' من فضلك حدد الحالة  ',
            'status.integer' => ' من فضلك حدد الحالة بشكل صحيح  ',
            'logo.image' => ' من فضلك صورة اللوجو غير صحيحة  ',
            'logo.max' => ' حجم اللوجو يجب الا ينجاوز 2 ميجا '
        ];
    }
}
