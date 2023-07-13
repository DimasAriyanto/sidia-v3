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
            'nama' => fake()->word(),
            'satuan' => fake()->randomElement(['kilo', 'gram', 'liter', 'unit', 'lembar', 'batang', 'ekor']),
            'stok' => 0,
        ];
    }
}
