<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return Gate::allows('user_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name"                  => "required",
            "email"                 => "required|unique:users,email",
            "password"              => "required",
            "password_confirmation" => "required|same:password",
            "status"                => "required|boolean",
            "role"                  => "required|exists:roles,id",
        ];
    }

    public function messages() {
        return [
            "name.required"                  => "Name is required",
            "email.required"                 => "Email is required",
            "email.unique"                   => "Email already exists",
            "password.required"              => "Password is required",
            "password_confirmation.required" => "Confirm Password is required",
            "password_confirmation.same"     => "Password does not not match",
            "status.boolean"                 => "Status must be Active or In-Active",
            "role.exists"                    => "Invalid Role is Selected",
        ];
    }
}
