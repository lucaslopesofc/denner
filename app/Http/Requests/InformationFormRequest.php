<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationFormRequest extends FormRequest
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
            'logo'         => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'desc'         => 'nullable|max:150',
            'facebook'     => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'instagram'    => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'street'       => 'nullable|max:100',
            'neighborhood' => 'nullable|max:100',
            'number'       => 'nullable|numeric',
            'telephone'    => 'nullable',
            'cellphone'    => 'nullable',
            'email'        => 'nullable|email',
            'city'         => 'nullable|max:100',
            
        ];
    }

    public function messages()
    {
        return [
            'logo.mimes'        => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'logo.max'          => 'Imagem deve ter tamanho máximo de 2MB.',

            'desc.max'          => 'A descrição do site deve ter no máximo 150 caracteres.',

            'facebook.regex'    => 'Formato de link inválido.',

            'instagram.regex'   => 'Formato de link inválido.',

            'street.max'        => 'O campo rua deve conter no máximo 100 caracteres.',
            
            'neighborhood.max'  => 'O campo bairro deve conter no máximo 100 caracteres.',

            'number.numeric'    => 'O campo número aceita somente números.',

            'email.email'       => 'Formato de email inválido.',

            'city.max'          => 'O campo cidade deve conter no máximo 100 caracteres.'
            
        ];
    }
}
