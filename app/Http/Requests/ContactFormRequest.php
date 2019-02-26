<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name'    => 'required|min:10|max:100',
            'email'   => 'required|email',
            'phone'   => 'required',
            'subject' => 'required|max:30',
            'message' => 'required|min:20|max:300'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter no mínimo 10 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Email inválido, por favor digite outro.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'subject.required' => 'O campo assunto é obrigatório.',
            'subject.max' => 'O campo assunto deve conter no máximo 30 caracteres.',
            'message.required' => 'O campo mensagem é obrigatório.'       ,
            'message.min' => 'O campo mensagem deve conter no mínimo 20 caracteres.',
            'message.max' => 'O campo mensagem deve conter no máximo 300 caracteres.'      
        ];
    }
}
