<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
          'code' => ['required', 'max:10', 'unique:items'],
          'name' => ['required'],
          'description' => [],
          'quantity' => ['numeric'],
          'minimum_stock' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' =>  __("validation.required", ["name" => "Kode barang"]),
            'name.required' => __("validation.required", ["name" => "Nama barang"]),
            'minimum_stock.required' => __("validation.required", ["name" => "Minimum stok"]),
            'quantity.numeric' => __("validation.numeric", ["name" => "Stok"]),
            'code.unique' => __("validation.unique", ["name" => "Kode barang"]),
        ];
    }
}
