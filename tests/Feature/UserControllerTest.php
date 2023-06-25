<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function setUp(): void
  {
    parent::setUp();
    $this->actingAs(User::factory()->admin()->create());
  }

  public function test_it_render_views(): void
  {
    $response = $this->get(route('dashboard.master.user.index'));
    $response->assertViewIs('master.user.index');

    $response = $this->get(route('dashboard.master.user.create'));
    $response->assertViewIs('master.user.create');

    $user = User::factory()->admin()->create();

    $response = $this->get(route('dashboard.master.user.show', ['id' => $user->id]));
    $response->assertViewIs('master.user.show');

    $response = $this->get(route('dashboard.master.user.edit', ['id' => $user->id]));
    $response->assertViewIs('master.user.edit');
  }
}
