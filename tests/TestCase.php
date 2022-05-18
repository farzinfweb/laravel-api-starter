<?php

namespace Tests;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected User $activeUser;

    protected function impersonate(User $user = null): self
    {
        $this->activeUser = $user ?? User::factory()->create();
        $this->actingAs($this->activeUser);

        return $this;
    }

    protected function withPermission(string $permission): self
    {
        Permission::create(['name' => $permission]);
        $this->activeUser->givePermissionTo($permission);

        return $this;
    }

    protected function withPermittedUser(string $permission, User $user = null): self
    {
        $this->impersonate($user);
        return $this->withPermission($permission);
    }
}
