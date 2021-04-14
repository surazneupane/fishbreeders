<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Gate::allows('post_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "title"          => "required",
            "slug"           => "required|unique:posts,slug",
            "excerpt"        => "required",
            "featured_image" => "required|image|mimes:png,jpg,jpeg,gif,svg|max:2048",
            "content"        => "required",
            "category"       => "required",
        ];
    }

    public function messages() {
        return [
            "title.required"          => "Post Title is Required",
            "sub_title.required"      => "Post SubTitle is Required",
            "slug.required"           => "Post Slug is required",
            "slug.unique"             => "Post Slug must be unique",
            "excerpt.required"        => "Post Excerpt is required",
            "featured_image.required" => "Post Featured Image is Required",
            "featured_image.image"    => "Post Featured Image must be image",
            "featured_image.mimes"    => "Post Featured Image must be type of png, svg, gif, jpg or jpeg",
            "featured_image.max"      => "Post Featured Image must not exceed 2MB",
            "content.required"        => "Post Content is Required",

        ];
    }
}
