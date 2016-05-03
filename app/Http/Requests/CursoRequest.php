<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursoRequest extends Request
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
        if($this->has('section')){
            return $this->validarActualizar();
        }
        else{
            return $this->validarCrear();
        }
        
    }

    public function validarCrear(){
        return [
        'titulo' => 'max:100|min:3|required',
        'descripcion' => 'max:255|min:5|required',
        'imagen' => 'image|required'
        ];
    }

    public function validarActualizar(){
        return [
        'titulo' => 'max:100|min:3|required',
        'descripcion' => 'max:255|min:5|required',
        'imagen' => 'image'
        ];
    }

     public function messages(){
        return [

        'imagen.required'   => 'La imagen no puede exceder el tamaño de 2.4 Megabytes.',
        'imagen.image'      => 'Recuerde subir un archivo tipo imagen valido.',
        'imagen.size'       => 'La imagen no puede exceder el tamaño de 2.4 Megabytes.',

        'titulo.max'        => 'El titulo no puede exceder de 100 caracteres',
        'titulo.min'        => 'El titulo tiene que tener minimo 3 caracteres',
        'titulo.required'   => 'El titulo es obligatorio',

        'descripcion.max'        => 'La descripción no puede exceder de 255 caracteres',
        'descripcion.min'        => 'La descripción tiene que tener minimo 5 caracteres',
        'descripcion.required'   => 'La descripción es obligatoria'
        ];
    }
}
