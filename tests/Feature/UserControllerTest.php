<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
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

    public function test_it_can_store_user(): void
    {
        $data = [
            'username' => 'test',
            'password' => 'test',
            'password_confirmation' => 'test',
            'user_type' => 'admin',
        ];
        $response = $this->post(route('dashboard.master.user.store'), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(User::class, [
            'username' => $data['username'],
        ]);
        $this->assertTrue(Auth::attempt($data));
    }

    public function test_it_can_update_user(): void
    {
        $user = User::factory()->create();
        $data = [
            'username' => 'test',
        ];
        $this->assertDatabaseHas(User::class, [
            'username' => $user->username,
        ]);
        $response = $this->put(route('dashboard.master.user.update', ['id' => $user->id]), $data);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas(User::class, [
            'username' => $data['username'],
        ]);
    }

    public function test_it_can_delete_user(): void
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas(User::class, [
            'id' => $user->id,
        ]);
        $response = $this->delete(route('dashboard.master.user.destroy', ['id' => $user->id]));
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing(User::class, [
            'id' => $user->id,
        ]);
    }
}
