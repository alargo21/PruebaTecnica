<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'inicio' => 'required|date_format:Y-m-d',
            'fin' => 'required|date_format:Y-m-d|after_or_equal:inicio',
            'precio' => 'required|numeric',
            'imagen' => 'mimes:jpeg,bmp,png'
        ];
    }
}
