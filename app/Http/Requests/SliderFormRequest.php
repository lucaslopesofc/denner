<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'image'  => 'required|mimes:jpeg,png,jpg|max:2048',
            'link'   => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'status' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'A imagem é obrigatória, por favor selecione uma.',
            'image.mimes'     => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'image.max'      => 'Imagem deve ter tamanho máximo de 2MB.',

            'link.regex'      => 'Formato de link inválido.',

            'status.required' => 'O campo status é obrigatório.',
        ];
    }
}