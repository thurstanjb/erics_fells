<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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

}
