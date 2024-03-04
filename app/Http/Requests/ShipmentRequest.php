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
            'order_number.required' =>  __("validation.required", ["name" => "Nomor pesanan"]),
            'entity_name.required' => __("validation.required", ["name" => "Nama pelanggan/supplier"]),
            'type.required' => __("validation.required", ["name" => "Jenis pengiriman"]),
            'status.required' => __("validation.required", ["name" => "Status pengiriman"]),
            'order_number.unique' => __("validation.unique", ["name" => "Nomor pesanan"]),
            'item_id.required' => __("validation.required", ["name" => "Barang"]),
            'item_id.exists' => __("validation.exists", ["name" => "Barang"]),
            'quantity.required' => __("validation.required", ["name" => "Jumlah"]),
            'quantity.integer' => __("validation.integer", ["name" => "Jumlah"]),
            'quantity.min' => __("validation.min.numeric", ["name" => "Jumlah", "min" => 1]),
        ];
    }
}
