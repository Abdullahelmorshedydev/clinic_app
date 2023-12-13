<?php

namespace App\Http\Requests\Back\Doctor;

use App\Models\Doctor;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $status = Doctor::$status;
        return [
            'image' => 'image|mimes:png,jpg|mimetypes:image/png,image/jpg',
            'user_id' => 'required|exists:users,id',
            'major_id' => 'required|exists:users,id',
            'bio' => 'required',
            'status' => 'required|' . Rule::in($status),
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Image type should be image',
            'image.mimes' => 'Image extension not supported',
            'image.mimetypes' => 'Image not allowed',
            'user_id.required' => 'User is required',
            'user_id.exists' => 'Can not found this user',
            'major_id.required' => 'Major is required',
            'major_id.exists' => 'Can not found this major',
            'bio.required' => 'Bio is required',
            'status.required' => 'Status is required',
            'status.in' => 'Status not allowed',
        ];
    }
}
