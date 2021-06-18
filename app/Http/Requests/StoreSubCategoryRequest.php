<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            "title"   => "required|unique:categories",
            "slug"    => "required|unique:categories,slug",
            "status"  => "required|boolean",
        ];
    }


    public function messages()
    {
        return [
            'title.required'  => "Title is required",
            'slug.required'   => "Slug is required",
            'slug.unique'     => "Slug must be unique",
            "status.required" => "Status is required",
        ];
    }
}
