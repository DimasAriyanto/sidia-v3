<?php

namespace App\Models\Transaksi;

use App\Models\Master\Barang;
use App\Models\Master\Supplier;
use App\Models\User;
use Database\Factories\TransaksiFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'tanggal_transaksi',
        'jenis_transaksi',
        'harga',
        'jumlah',
        'barang_id',
        'user_id',
        'supplier_id',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    protected static function newFactory(): Factory
    {
        return TransaksiFactory::new();
    }
}
