<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = "/api/v1/";


    public function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }


    public function signIn()
    {
        Passport::actingAs(create(User::class));
    }
}
