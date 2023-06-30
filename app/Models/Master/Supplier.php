<?php

namespace App\Models\Master;

use Database\Factories\SupplierFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'nama',
        'alamat',
        'nomor_telepon',
    ];

    protected static function newFactory(): Factory
    {
        return SupplierFactory::new();
    }
}
