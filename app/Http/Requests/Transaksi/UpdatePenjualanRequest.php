<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenjualanRequest extends FormRequest
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
            'tanggal_transaksi' => 'sometimes|required|date',
            'jenis_transaksi' => 'sometimes|required|string',
            'harga' => 'sometimes|required|numeric',
            'jumlah' => 'sometimes|required|integer',
            'barang_id' => 'sometimes|required|exists:barang,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'supplier_id' => 'sometimes|nullable|exists:supplier,id',
        ];
    }
}
