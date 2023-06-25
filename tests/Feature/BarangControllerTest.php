<?php

namespace Tests\Feature;

use App\Models\Master\Barang;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BarangControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_render_views(): void
    {
        $barang = Barang::factory()->create();
        dd($barang);
    }
}
