<?php

namespace Tests;

use App\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * fake sign in using normal user 
     *
     * @param object|null $user
     * @return $this
     */
    protected function signIn($user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);
        return $this;
    }

    /**
     * fake sign in with passport account and oauth verification 
     *
     * @param User $user
     * @return $this
     */
    protected function signInWithPassport($user)
    {
        Passport::actingAs($user);
        return $this;
    }
}
