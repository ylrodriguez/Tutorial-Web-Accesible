<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LeccionRequest extends Request
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
        return $this->validarCrear();
    }

    public function validarCrear(){
        return [
        'titulo' => 'max:100|min:3|required',
        'descripcion' => 'max:255|min:5|required',
        'linkvideo' => 'max:20|min:4|required'
        ];
    }


    public function messages(){
        return [

        'linkvideo.required'   => 'Es necesario indicar el link de un video-lección',

        'titulo.max'        => 'El titulo no puede exceder de 100 caracteres',
        'titulo.min'        => 'El titulo tiene que tener minimo 3 caracteres',
        'titulo.required'   => 'El titulo es obligatorio',

        'descripcion.max'        => 'La descripción no puede exceder de 255 caracteres',
        'descripcion.min'        => 'La descripción tiene que tener minimo 5 caracteres',
        'descripcion.required'   => 'La descripción es obligatoria'
        ];
    }
}
