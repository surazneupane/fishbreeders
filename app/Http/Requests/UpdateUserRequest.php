<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        if ($this->id == Auth::user()->id) {
            return false;
        }

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
            "email"                 => "required|unique:users,email," . $this->id,
            "password_confirmation" => "same:password",
            "status"                => "required|boolean",
            "role"                  => "required|exists:roles,id",
        ];
    }

    public function messages() {
        return [
            "name.required"              => "Name is required",
            "email.required"             => "Email is required",
            "email.unique"               => "Email already exists",
            "password_confirmation.same" => "Password does not not match",
            "status.boolean"             => "Status must be Active or In-Active",
            "role.exists"                => "Invalid Role is Selected",
        ];
    }
}
