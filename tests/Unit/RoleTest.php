<?php

namespace Tests\Unit;

use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_set_a_role()
    {
        $role = createLp(Role::class, ['name' => 'administrator']);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id
        ]);
    }
}
