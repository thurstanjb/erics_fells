<?php

namespace Tests\Unit;

use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_set_a_permission()
    {
        $permission = createLp(Permission::class, ['name' => 'user view']);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id
        ]);
    }
}
