<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
            'price' => 'required|numeric',
            'optional_price' => 'numeric',
            'products' => 'required|array',
            'products.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'No se puede crear una talla sin nombre.',
            'name.max:100' => 'El nombre no puede contener más de 100 caracteres.',
            'price.required' => 'Es necesario que se añada un precio',
            'price.numeric' => 'El precio ha de ser un valor numérico',
            'optional_price.numeric' => 'El precio ha de ser un valor numérico',
            'products.required'  => 'Es necesario que la talla esté asignada a un producto.',
            'products.array'  => 'Algo ha ido mal al guardar los productos, vuelva a intentarlo.',
            'products.*.required'  => 'Seleccione un producto por favor.',
        ];
    }
}
