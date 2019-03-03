<?php

namespace Tests\Unit;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleHasPermissionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _create_a_role_permission_relationship()
    {
        $role = createLp(Role::class, ['name' => 'admin']);
        $permission = createLp(Permission::class, ['name' => 'user view']);

        $role->givePermissionTo($permission);

        $this->assertDatabaseHas('role_has_permissions', [
            'permission_id' => $permission->id,
            'role_id' => $role->id
        ]);

        $this->assertEquals($role->name, $permission->roles->first()->name);

    }

    /**
     * @test
     */
    public function _a_role_can_have_more_than_one_permission()
    {
        $role = createLp(Role::class, ['name' => 'author']);
        $view = createLp(Permission::class, ['name' => 'article view']);
        $create = createLp(Permission::class, ['name' => 'article create']);
        $edit = createLp(Permission::class, ['name' => 'article edit']);
//        $edit = createLp(Permission::class, ['name' => 'article edit']);

        $role->givePermissionTo([$view, $create, $edit]);

        $this->assertCount(3, $role->permissions);

        $this->assertTrue($role->hasPermissionTo('article view'));
        $this->assertTrue($role->hasPermissionTo('article edit'));
        $this->assertFalse($role->checkPermissionTo('article delete'));
    }
}
