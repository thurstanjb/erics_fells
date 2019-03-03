<?php

namespace Tests\Unit;

use App\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelHasRolesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _a_model_can_have_a_role()
    {
        $model = create(User::class);
        $role = createLp(Role::class,['name' => 'admin']);

        $model->assignRole($role);

        $this->assertDatabaseHas('model_has_roles', [
            'model_id' => $model->id,
            'role_id' => $role->id
        ]);
    }

    /**
     * @test
     */
    public function _a_model_can_have_mode_than_one_role()
    {
        $model = create(User::class);
        $admin = createLp(Role::class, ['name' => 'admin']);
        $author = createLp(Role::class, ['name' => 'author']);
        $editor = createLp(Role::class, ['name' => 'editor']);

        $model->assignRole([$admin, $author, $editor]);

        $this->assertCount(3, $model->roles);

        $this->assertDatabaseHas('model_has_roles', [
            'model_type' => 'App\User',
            'model_id' => $model->id,
            'role_id' => $editor->id
        ]);
    }
}
