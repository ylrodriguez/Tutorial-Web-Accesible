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
        if($this->has('section')){
            switch ($this->section) {
                case 'myInformation':
                    return $this->validarActualizar();
                    break;
                case 'password':
                    return $this->validarPassword();
                    break;
                case 'masInformacion':
                    return [];
                    break;
                case 'imagenPerfil':
                    return ['imagen' => 'image|required|size:2048'];
                    break;
            }
        }
        return $this->validarCrear();
    }

    public function validarCrear(){
        return [
        'nombre'    =>  'min:8|max:120|required|regex:/^[(a-zA-Z\s)ñáéíóú]+$/u', /*Validación nombres*/
        'username'  =>  'min:5|max:15|unique:users,username|required|regex:/^[\w-]+$/',
        'email'     =>  'min:5|max:200|unique:users,email|required|email',
        'password'  =>  'min:8|max:20|required',
        'pais' => 'required',
        'fecha_nac_birthDay' => 'required'
        ];
    }

    public function validarActualizar(){
        $id = $this->id;
        return [
        'nombre'    =>  'min:8|max:120|required|regex:/^[(a-zA-Z\s)ñáéíóú]+$/u', /*Validación nombres*/
        'username'  =>  'min:5|max:15|unique:users,username,'.$id.'|required|regex:/^[\w-]+$/',
        'email'     =>  'min:5|max:200|unique:users,email,'.$id.'|required|email',
        'pais' => 'required',
        'fecha_nac_birthDay' => 'required',
        'biografia' => 'max:255'
        ];
    }

    public function validarPassword(){
        return [
        'newPassword' => 'min:8|max:20|required'
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
        'username.required' => 'Por favor indique un nombre de usuario.',
        'username.regex'    => 'El nombre de usuario no puede contener espacios y se compone solo de letras y numeros.',

        'password.min'      => 'La contraseña debe ser minimo de 8 caracteres.',
        'password.max'      => 'La contraseña debe ser maximo de 20 caracteres.',
        'password.required'      => 'Por favor indique una contraseña.',

        'newPassword.min'      => 'La contraseña debe ser minimo de 8 caracteres.',
        'newPassword.max'      => 'La contraseña debe ser maximo de 20 caracteres.',
        'newPassword.required'      => 'Por favor indique una contraseña.',

        'fecha_nac_birthDay.required' => 'Por favor indique su fecha de nacimiento.',

        'imagen.required'   => 'La imagen no puede exceder el tamaño de 2.4 Megabytes.',
        'imagen.image'      => 'Recuerde subir un archivo tipo imagen valido.',
        'imagen.size'       => 'La imagen no puede exceder el tamaño de 2.4 Megabytes.'

        ];
    }

}
