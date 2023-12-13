<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('auth/register.name_required_valid'),
            'name.min' => trans('auth/register.name_min_max_valid'),
            'name.max' => trans('auth/register.name_min_max_valid'),
            'name.string' => trans('auth/register.name_string_valid'),
            'email.required' => trans('auth/register.email_required_valid'),
            'email.email' => trans('auth/register.email_email_valid'),
            'email.unique' => trans('auth/register.email_unique_valid'),
            'phone.required' => trans('auth/register.phone_required_valid'),
            'password.required' => trans('auth/register.password_required_valid'),
            'password.min' => trans('auth/register.password_min_valid'),
            'confirm_password.required' => trans('auth/register.confirm_password_required_valid'),
            'confirm_password.same' => trans('auth/register.confirm_password_same_valid'),
        ];
    }
}
