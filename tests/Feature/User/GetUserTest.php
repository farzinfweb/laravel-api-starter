<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A user can fetch his own data
     *
     * @return void
     */
    public function test_user_can_fetch_self()
    {
        $user = User::factory()->create();

        $this->impersonate($user)
            ->getJson(route('users.self'))
            ->assertOk()
            ->assertJson(['data' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'username' => $user->username,
                'email' => $user->email,
                'is_email_verified' => $user->email_verified_at !== null,
                'created_at' => $user->created_at->toJSON(),
            ]]);
    }
}
