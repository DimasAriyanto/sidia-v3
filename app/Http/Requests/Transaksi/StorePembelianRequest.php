<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tanggal_transaksi' => 'required|date',
            'jenis_transaksi' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'barang_id' => 'required|exists:barang,id',
            'user_id' => 'required|exists:users,id',
            'supplier_id' => 'required|exists:supplier,id',
        ];
    }
}
