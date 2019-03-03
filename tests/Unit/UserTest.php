<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_create_its_model_factory()
    {
        $user = create(User::class);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);
    }

    /**
     * @test
     */
    public function _it_can_create_an_admin_user()
    {
        $this->signInAdminUser();

        $this->assertTrue($this->user->hasRole('admin'));
        $this->assertTrue($this->user->can('user edit'));
        $this->assertTrue($this->user->can('user delete'));

    }
}
