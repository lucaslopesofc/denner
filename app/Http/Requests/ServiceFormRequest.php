<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceFormRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string',
            'text'  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes'    => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'image.max'      => 'Imagem deve ter tamanho máximo de 2MB.',

            'title.required' => 'O campo título é obrigatório.',
            'title.string'   => 'O título deve ser formado apenas por letras e números.',

            'text.required'  => 'O campo descrição é obrigatório.',
            'text.string'    => 'O campo descrição deve ser formador apenas por letras e números.',
        ];
    }
}
