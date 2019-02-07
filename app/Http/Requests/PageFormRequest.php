<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
            'title'    => 'required|max:60',
            'subtitle' => 'nullable|max:60',
            'text1'    => 'required|max:600',
            'text2'    => 'max:600',
            'image'    => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.max'      => 'O campo título deve conter no máximo 60 caracteres.',

            'subtitle.max'   => 'O campo subtítulo deve conter no máximo 60 caracteres.',

            'text1.required' => 'O campo 1º parágrafo é obrigatório.',
            'text1.max'      => 'O 1º parágrafo não pode conter mais que 600 caracteres.',

            'text2.max'      => 'O 1º parágrafo não pode conter mais que 600 caracteres.',

            'image.mimes'     => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'image.max'       => 'Imagem deve ter tamanho máximo de 2MB.',
        ];
    }
}
