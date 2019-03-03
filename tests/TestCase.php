<?php

namespace Tests;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    protected function signIn($user = null){
        $this->user = $user ?: create(User::class);

        $this->actingAs($this->user);

        return $this;
    }

    protected function signInUser($user = null){
        $this->user = $user ?: create(User::Class);

        $this->actingAs($this->user);

        return $this;
    }

    protected function signInAdminUser($user = null){
        $this->user = $user ?: create(User::Class);

        $role = createLp(Role::class, ['name' => 'admin']);
        $user_view = createLp(Permission::class, ['name' => 'user view']);
        $user_create = createLp(Permission::class, ['name' => 'user create']);
        $user_edit = createLp(Permission::class, ['name' => 'user edit']);
        $user_delete = createLp(Permission::class, ['name' => 'user delete']);

        $role->givePermissionTo([$user_view, $user_create, $user_edit, $user_delete]);


        $this->user->assignRole($role);

        $this->actingAs($this->user);

        return $this;
    }

}
