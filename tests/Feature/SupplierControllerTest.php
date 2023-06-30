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
