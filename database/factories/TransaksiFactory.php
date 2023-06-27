<?php

namespace Database\Factories;

use App\Models\Master\Barang;
use App\Models\Master\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisTransaksi = fake()->randomElement(['Pembelian', 'Penjualan']);
        $harga = fake()->randomFloat(2, 10, 1000);
        $jumlah = fake()->numberBetween(1, 10);
        $total = $harga * $jumlah;

        return [
            'tanggal' => fake()->dateTime(),
            'janis' => $jenisTransaksi,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'barang_id' => function () {
                return Barang::inRandomOrder()->first()->id;
            },
            'user_id' => function () {
            return User::inRandomOrder()->first()->id;
            },
            'supplier_id' => function () use ($jenisTransaksi) {
                return ($jenisTransaksi == 'Pembelian') ? Supplier::inRandomOrder()->first()->id : null;
            },

        ];
    }
}
