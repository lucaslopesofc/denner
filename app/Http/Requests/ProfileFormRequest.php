<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'name'                  => 'required|string|max:100',
            'login'                 => 'required|string|max:100',
            'email'                 => 'required|email',
            'password'              => 'nullable|min:6',
            'newPassword'           => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'photo'                 => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'O campo nome é obrigatório',
            'name.string'    => 'O campo nome só aceita letras.',
            'name.max'       => 'O campo nome deve conter no máximo 100 caracteres.',
            'login.required' => 'O campo email é obrigatório.',
            'login.string'   => 'O campo login deve conter apenas letras.',
            'login.max'      => 'O campo login deve conter no máximo 100 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email'    => 'Formato de email inválido. Por favor verifique.',
            'password.min'   => 'O campo senha deve conter no mínimo 6 caracteres.',
            'photo.mimes'    => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'photo.max'      => 'Imagem deve ter tamanho máximo de 2MB.',
            'newPassword.min' => 'A nova senha deve ter no mínimo 6 caracteres.',
            'newPassword.required_with' => 'Teste',
            'newPassword.same' => 'A nova senha e a confirmação da senha devem corresponder.',
        ];
    }
}
