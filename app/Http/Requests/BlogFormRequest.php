<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'category' => 'required|integer',
            'title'    => 'required|string|max:100',
            'slug'     => 'unique:blogs',
            'text'     => 'required',
            'image'    => 'mimes:jpeg,png,jpg|max:2048',
            'status'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Selecione uma categoria.',
            'category.integer'  => 'Nenhuma categoria selecionada, por favor escolha para prosseguir.',
            'title.required'    => 'O título é obrigatório.',
            'title.string'      => 'O título deve conter somente letras e números.',
            //'title.unique'      => 'Título já existente, por favor digite outro.',
            //'slug.unique'      => 'Slug já existente, por favor digite outro.',
            'title.max'         => 'O título deve ter no máximo 100 caracteres.',
            'text.required'     => 'O texto da postagem é obrigatório.',
            'image.mimes'       => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'image.max'         => 'Imagem deve ter tamanho máximo de 2MB.',
            'status.required'   => 'O status é obrigatório.'
        ];
    }
}
