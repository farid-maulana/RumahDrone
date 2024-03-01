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
        return [
            'order_number' => [
                'required',
                Rule::unique('shipments')->ignore($this->route('shipment')->id),
            ],
            'order_date' => ['required', 'date'],
            'customer' => ['required', 'string'],
            'address' => ['required', 'string'],
            'item_id' => ['required', 'exists:items,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'shipment_date' => ['nullable', 'date'],
            'delivery_date' => ['nullable', 'date'],
            'status' => ['string'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'order_number.required' =>  __("validation.required", ["name" => "Nomor pesanan"]),
            'order_date.required' => __("validation.required", ["name" => "Tanggal pemesanan"]),
            'customer.required' => __("validation.required", ["name" => "Nama pelanggan"]),
            'address.required' => __("validation.required", ["name" => "Alamat pelanggan"]),
            'order_number.unique' => __("validation.unique", ["name" => "Nomor pesanan"]),
            'item_id.required' => __("validation.required", ["name" => "Barang"]),
            'item_id.exists' => __("validation.exists", ["name" => "Barang"]),
            'quantity.required' => __("validation.required", ["name" => "Jumlah"]),
            'quantity.integer' => __("validation.integer", ["name" => "Jumlah"]),
            'quantity.min' => __("validation.min.numeric", ["name" => "Jumlah", "min" => 1]),
        ];
    }
}
