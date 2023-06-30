<?php

namespace Tests\Feature;

use App\Models\Master\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SupplierControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->admin()->create());
    }

    public function test_it_can_render_views(): void
    {
        $response = $this->get(route('dashboard.master.supplier.index'));
        $response->assertViewIs('master.supplier.index');

        $response = $this->get(route('dashboard.master.supplier.create'));
        $response->assertViewIs('master.supplier.create');

        $supplier = Supplier::factory()->create();

        $response = $this->get(route('dashboard.master.supplier.show', ['id' => $supplier->id]));
        $response->assertViewIs('master.supplier.show');

        $response = $this->get(route('dashboard.master.supplier.edit', ['id' => $supplier->id]));
        $response->assertViewIs('master.supplier.edit');
    }

    public function test_it_can_store_supplier(): void
    {
        $data = [
            'nama' => 'PT. Mencari Cinta Sejati',
            'alamat' => 'Cibaduyut',
            'nomer_telepon' => '08123456789',
        ];
        $response = $this->post(route('dashboard.master.supplier.store'), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(Supplier::class, [
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'nomer_telepon' => $data['nomer_telepon'],
        ]);
    }

    public function test_it_can_update_supplier(): void
    {
        $supplier = Supplier::factory()->create();
        $data = [
            'nama' => 'PT. Mencari Cinta Sejati Updated',
            'alamat' => 'Cibaduyut Updated',
            'nomer_telepon' => '08123456789',
        ];
        $this->assertDatabaseHas(Supplier::class, [
            'id' => $supplier->id,
            'nama' => $supplier->nama,
            'alamat' => $supplier->alamat,
            'nomer_telepon' => $supplier->nomer_telepon,
        ]);
        $response = $this->put(route('dashboard.master.supplier.update', ['id' => $supplier->id]), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(Supplier::class, [
            'id' => $supplier->id,
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'nomer_telepon' => $data['nomer_telepon'],
        ]);
    }

    public function test_it_can_delete_supplier(): void
    {
        $supplier = Supplier::factory()->create();
        $this->assertDatabaseHas(Supplier::class, [
            'id' => $supplier->id,
        ]);
        $response = $this->delete(route('dashboard.master.supplier.destroy', ['id' => $supplier->id]));
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing(Supplier::class, [
            'id' => $supplier->id,
        ]);
    }

    public function test_it_redirect_to_index_if_not_found(): void
    {
        $indexRoute = 'dashboard.master.supplier.index';
        $notFoundId = -9999;
        $response = $this->get(route('dashboard.master.supplier.show', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->get(route('dashboard.master.supplier.edit', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->put(route('dashboard.master.supplier.update', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();

        $response = $this->delete(route('dashboard.master.supplier.destroy', ['id' => $notFoundId]));
        $response->assertRedirectToRoute($indexRoute);
        $response->assertSessionHasErrors();
    }
}
