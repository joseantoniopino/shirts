<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'variants' => 'required|array',
            'variants.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'No se puede crear un producto sin nombre.',
            'name.max:100' => 'El nombre no puede contener más de 100 caracteres.',
            'variants.required'  => 'Es necesario que el producto tenga al menos una talla.',
            'variants.array'  => 'Algo ha ido mal al guardar las tallas, vuelva a intentarlo.',
            'variants.*.required'  => 'Seleccione una talla por favor.',
        ];
    }
}
