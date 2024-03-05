<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShipmentRequest extends FormRequest
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
        $rules = [
            'order_number' => ['required', Rule::unique('shipments')],
            'entity_name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'item_id' => ['required', 'exists:items,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'string'],
        ];

        if ($this->isMethod('put')) {
            $rules['order_number'] = [
                'required',
                Rule::unique('shipments')->ignore($this->route('shipment')->id),
            ];
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'order_number.required' =>  "Nomor pemesanan wajib diisi",
            'entity_name.required' => "Nama pelanggan/supplier wajib diisi",
            'type.required' => "Jenis pengiriman wajib diisi",
            'status.required' => "Status pengiriman wajib diisi",
            'order_number.unique' => "Nomor pesanan sudah terdaftar",
            'item_id.required' => "Barang wajib diisi",
            'item_id.exists' => "Barang tidak ada di database",
            'quantity.required' => "Jumlah wajib diisi",
            'quantity.integer' => "Jumlah harus berupa angka",
            'quantity.min' => "Jumlah minimal 1"
        ];
    }
}
