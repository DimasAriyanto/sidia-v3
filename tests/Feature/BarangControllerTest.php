<?php

namespace Tests\Feature;

use App\Models\Master\Barang;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BarangControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->admin()->create());
    }

    public function test_it_can_render_views(): void
    {
        $response = $this->get(route('dashboard.master.barang.index'));
        $response->assertViewIs('master.barang.index');

        $response = $this->get(route('dashboard.master.barang.create'));
        $response->assertViewIs('master.barang.create');

        $barang = Barang::factory()->create();

        $response = $this->get(route('dashboard.master.barang.show', ['id' => $barang->id]));
        $response->assertViewIs('master.barang.show');

        $response = $this->get(route('dashboard.master.barang.edit', ['id' => $barang->id]));
        $response->assertViewIs('master.barang.edit');
    }
}
