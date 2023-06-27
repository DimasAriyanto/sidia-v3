<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'tanggal',
        'jenis',
        'harga',
        'jumlah',
        'barang_id',
        'user_id',
        'supplier_id',
    ];
}
