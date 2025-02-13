<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'rol' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe contener solo caracteres.',
            'name.max' => 'El nombre debe ser menor a 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.string' => 'El email debe contener solo caracteres.',
            'email.max' => 'El email debe ser menor a 255 caracteres.',
            'email.unique' => 'Este email ya existe',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe contener solo caracteres.',
            'password.min' => 'La contraseña debe ser mayor a 8 caracteres.',
            'rol.required' => 'El rol es obligatorio.',
            'rol.string' => 'El rol debe contener solo caracteres.',
        ];
    }
}
