<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyFormRequest extends FormRequest
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
            'name'    => 'required|max:30',
            'city'    => 'required|max:25',
            'comment' => 'required|max:160',
            'photo'   => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'O campo nome é obrigatório.',
            'name.max'         => 'O campo nome aceita no máximo 30 caracteres.',
            'city.required'    => 'O campo cidade é obrigatório.',
            'city.max'         => 'O campo cidade aceita no máximo 25 caracteres.',
            'comment.required' => 'O campo comentário é obrigatório.',
            'comment.max'      => 'O comentário deve conter no máximo 160 caracteres.',
            'photo.mimes'      => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
            'photo.max'        => 'Imagem deve ter tamanho máximo de 2MB.',
        ];
    }
}
