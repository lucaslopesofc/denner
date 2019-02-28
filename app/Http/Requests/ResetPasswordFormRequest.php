<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordFormRequest extends FormRequest
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
            'password'              => 'required|min:6',
            'newPassword'           => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required'         => 'O campo Senha Atual é obrigatório.',
            'password.min'              => 'O campo senha deve conter no mínimo 6 caracteres.',

            'newPassword.required'      => 'O campo Nova Senha é obrigatório.',
            'newPassword.min'           => 'A nova senha deve ter no mínimo 6 caracteres.',
            'newPassword.required_with' => 'Teste',
            'newPassword.same'          => 'A nova senha e a confirmação da senha devem corresponder.',

            'password_confirmation.required' => 'O campo Repita a Senha é obrigatório.',
            'password_confirmation.min'      => 'O campo Repita a Senha deve conter no mínimo 6 caracteres.',
        ];
       
    }
}