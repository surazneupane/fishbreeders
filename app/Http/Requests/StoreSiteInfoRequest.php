<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteInfoRequest extends FormRequest
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
            'banner' => 'image|mimes:png,jpg,jpeg',
            'logo'  => 'image|mimes:png,jpg,jpeg,svg',
            'banner_text' => 'required|string',
            'about_us'      => 'required|string',
            'small_banner_text' =>'required|string',
            'small_banner_description'=>'required|string',
            'footer_about' => 'required',
        ];
    }
}
