<?php

namespace Database\Factories;

use App\Models\Master\Barang;
use App\Models\Master\Supplier;
use App\Models\Transaksi\Transaksi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisTransaksi = fake()->randomElement(Transaksi::$JENIS_TRANSAKSI);
        $harga = fake()->randomFloat(0, 1000, 100000);
        $jumlah = fake()->numberBetween(1, 10);

        return [
            'tanggal_transaksi' => fake()->dateTimeBetween('-1 month', '+3 months'),
            'jenis_transaksi' => $jenisTransaksi,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'barang_id' => function () {
                return Barang::inRandomOrder()->first()->id;
            },
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'supplier_id' => function () use ($jenisTransaksi) {
                return ($jenisTransaksi == 'pembelian') ? Supplier::inRandomOrder()->first()->id : null;
            },

        ];
    }

    public function pembelian(): static
    {
        return $this->state(fn (array $attributes) => [
            'jenis_transaksi' => 'pembelian',
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
        ]);
    }

    public function penjualan(): static
    {
        return $this->state(fn (array $attributes) => [
            'jenis_transaksi' => 'penjualan',
        ]);
    }
}
