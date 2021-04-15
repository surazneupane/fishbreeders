<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "title"  => "required",
            "slug"   => "required|unique:categories,slug," . $this->id,
            "status" => "required|boolean",
            'post_content' => 'required',

        ];
    }

    /**
     * Get the error messages that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required'  => "Title is required",
            'slug.required'   => "Slug is required",
            'slug.unique'     => "Slug must be unique",
            "status.required" => "Status is required",
            "status.boolean"  => "Status should be Active or In-Active",
        ];
    }
}
