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
            'code.required' =>  'Kode barang wajib diisi',
            'name.required' => 'Nama barang wajib diisi',
            'minimum_stock.required' => 'Minimum stok barang wajib diisi',
            'quantity.numeric' => 'Stok harus berupa angka',
            'code.unique' => 'Kode barang sudah terdaftar',
        ];
    }
}
