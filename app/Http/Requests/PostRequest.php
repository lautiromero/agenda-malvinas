<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if ($this->user_id == auth()->user()->id) {
        //     return true;
        // } else {
        //     return false;
        // }

        return true;        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //recuperamos el post
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'extract' => 'required',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|image',
            'img_desc' => 'required'
        ];

        //si el post existe(edit) excluye en actual slug de la validacion
        //y el campo imagen no es obligatorio
        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' .$post->id;
            $rules['image'] = 'image';
        }

        return $rules;
    }
}
