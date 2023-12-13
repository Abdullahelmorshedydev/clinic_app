<?php

namespace App\Http\Requests\Back\Major;

use App\Models\Major;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $status = Major::$status;
        return [
            'name' => 'required|min:3|string|unique:majors,name',
            'image' => 'required|image|mimes:png,jpg,jpeg|mimetypes:image/jpeg,image/png',
            'status' => 'required|' . Rule::in($status)
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.min' => 'Name minimum length 3 characters!',
            'name.unique' => 'Name in use',
            'name.string' => 'Name type should be a string!',
            'image.required' => 'Image is required!',
            'image.image' => 'Image type should be an image!',
            'image.mimes' => 'Image extension not supported!',
            'image.mimetypes' => 'Image extension not supported!',
            'status.required' => 'Status is required!',
            'status.in' => 'Status not allowed!',
        ];
    }
}
