<?php

namespace Database\Factories;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->catchPhrase(),
            'harga' => fake()->randomNumber(5, true),
            'satuan' => 'Alat',
            'stok' => 0,
        ];
    }
}
