<?php

namespace App\Models\Master;

use Database\Factories\BarangFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama',
        'satuan',
        'stok',
    ];

    protected static function newFactory(): Factory
    {
        return BarangFactory::new();
    }
}
