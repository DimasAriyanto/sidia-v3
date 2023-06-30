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

    public function test_it_can_store_barang(): void
    {
        $data = [
            'nama' => 'Pensil 2B',
            'satuan' => 'Biji',
        ];
        $response = $this->post(route('dashboard.master.barang.store'), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(Barang::class, [
            'nama' => $data['nama'],
            'satuan' => $data['satuan'],
        ]);
    }

    public function test_it_can_update_barang(): void
    {
        $barang = Barang::factory()->create();
        $data = [
            'nama' => 'updated',
            'satuan' => 'updated',
        ];
        $this->assertDatabaseHas(Barang::class, [
            'id' => $barang->id,
            'nama' => $barang->nama,
            'satuan' => $barang->satuan,
        ]);
        $response = $this->put(route('dashboard.master.barang.update', ['id' => $barang->id]), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(Barang::class, [
            'id' => $barang->id,
            'nama' => $data['nama'],
            'satuan' => $data['satuan'],
        ]);
    }

    public function test_it_can_delete_barang(): void
    {
        $barang = Barang::factory()->create();
        $this->assertDatabaseHas(Barang::class, [
            'id' => $barang->id,
        ]);
        $response = $this->delete(route('dashboard.master.barang.destroy', ['id' => $barang->id]));
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing(Barang::class, [
            'id' => $barang->id,
        ]);
    }

    public function test_it_redirect_to_index_if_not_found(): void
    {
        $indexRoute = 'dashboard.master.barang.index';
        $notFoundId = -9999;
        $response = $this->get(route('dashboard.master.barang.show', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->get(route('dashboard.master.barang.edit', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->put(route('dashboard.master.barang.update', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->delete(route('dashboard.master.barang.destroy', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();
    }
}
