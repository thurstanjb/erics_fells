<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUserFunctionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _a_user_needs_the_access_user_permission_to_view_users()
    {
        $this->signIn();
        $response = $this->json('get', '/admin/users');

        $response->assertStatus(403);

        $this->signInAdminUser();

        $response = $this->json('get', '/admin/users');

        $response->assertStatus(200);

    }
}
