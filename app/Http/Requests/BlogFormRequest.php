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
    public function rules($request)
    {
        if($request->input('slug') == $blog->slug)
        {
            return [
                'category' => 'required|integer',
                'title'    => 'required|max:100',
                'text'     => 'required',
                'image'    => 'mimes:jpeg,png,jpg|max:2048',
                'status'   => 'required'
            ];
        }else{
            return [
                'category' => 'required|integer',
                'title'    => 'required|max:100',
                'slug'     => 'required|alpha_dash|min:5|max:255|unique:blogs,slug',
                'text'     => 'required',
                'image'    => 'mimes:jpeg,png,jpg|max:2048',
                'status'   => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'category.required' => 'Selecione uma categoria.',
            'category.integer'  => 'Nenhuma categoria selecionada, por favor escolha para prosseguir.',
            'title.required'    => 'O título é obrigatório.',
            'title.max'         => 'O título deve ter no máximo 100 caracteres.',
            'slug.required'     => 'O campo URL é obrigatório',
            'slug.alpha_dash'   => 'A URL não pode conter espaços e nem caracteres epeciais.',
            'slug.min'          => 'A URL deve ter no mínimo 5 caracateres.',
            'slug.max'          => 'A URL deve ter no máximo 255 caracteres.',
            'slug.unique'       => 'URL já existe, por favor digite outra.',
            'text.required'     => 'O texto da postagem é obrigatório.',
            'image.mimes'       => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'image.max'         => 'Imagem deve ter tamanho máximo de 2MB.',
            'status.required'   => 'O status é obrigatório.'
        ];
    }
}
