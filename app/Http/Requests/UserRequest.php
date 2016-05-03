<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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

        return $this->ValidacionCrear();
    }

    public function ValidacionCrear(){
        return [
        'nombre'    =>  'min:8|max:120|required|regex:/^[(a-zA-Z\s)ñáéíóú]+$/u', /*Validación nombres*/
        'username'  =>  'min:5|max:15|unique:users,username|required|regex:/^[\w-]+$/',
        'email'     =>  'min:5|max:200|unique:users,email|required',
        'password'  =>  'min:8|max:20|required',
        'fecha_nac_birthDay' => 'required'
        ];
    }

    public function messages(){
        return [
        'nombre.regex'      =>  'Escriba un nombre válido.',

        'email.unique'      => 'Este correo electrónico ya está registrado.',
        'email.min'         => 'El correo electrónico ser minimo de 5 caracteres.',
        'email.max'         => 'El correo electrónico debe ser máximo de 200 caracteres.',
        'email.required'    => 'Por favor indique un correo electrónico.',


        'username.unique'   => 'Este nombre de usuario ya está en uso.',
        'username.min'      => 'El nombre de usuario debe ser minimo de 5 caracteres.',
        'username.max'      => 'El nombre de usuario debe ser máximo de 15 caracteres.',
        'username.required'      => 'Por favor indique un nombre de usuario.',
        'username.regex'    =>  'El nombre de usuario no puede contener espacios y se compone solo de letras y numeros.',

        'password.min'      => 'La contraseña debe ser minimo de 8 caracteres.',
        'password.max'      => 'La contraseña debe ser maximo de 20 caracteres.',
        'password.required'      => 'Por favor indique una contraseña.',

        'fecha_nac_birthDay.required' => 'Por favor indique su fecha de nacimiento.',

        ];
    }

}
