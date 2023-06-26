<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_render_views(): void
    {
        $response = $this->get(route('auth.show-login-form'));
        $response->assertViewIs('auth.login');
    }

    public function test_it_can_logged_in(): void
    {
        $data = [
            'username' => 'test',
            'password' => 'test',
        ];

        $user = User::factory()->create($data);

        $data['remember_me'] = 'on';

        $response = $this->post(route('auth.post-login'), $data);
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirectToRoute('dashboard.index');

        $this->assertAuthenticatedAs($user);
    }

    public function test_it_can_logged_out(): void
    {
        $user = User::factory()->create();
        Auth::login($user, true);
        $this->assertAuthenticatedAs($user);

        $rememberToken = $user->getRememberToken();

        $response = $this->post(route('auth.post-logout'));
        $response->assertRedirectToRoute('auth.show-login-form');
        $this->assertFalse(Auth::check());
        $this->assertNotEquals($user->getRememberToken(), $rememberToken);
    }
}
