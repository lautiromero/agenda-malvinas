<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
       //recuperamos la publicidad
       $ad = $this->route()->parameter('ad');

       $rules = [
           'name' => 'required',
           'type' => 'required',
           'image' => 'required|image',
           'link' => 'required'
       ];

       //si la publi existe(edit) el campo imagen no es obligatorio
       if($ad){
           $rules['image'] = 'image';
       }

       return $rules;
    }
}
