<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',
            'comment' => 'required|min:10|max:400'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter no mínimo 5 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 50 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Email inválido, por favor digite novamente.',
            'comment.required' => 'O campo comentário é obrigatório.',
            'comment.min' => 'O campo comentário deve ter no mínimo 10 caracteres.',
            'comment.max' => 'O campo comentário deve ter no máximo 400 caracteres.'
        ];
    }
}
