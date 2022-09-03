<?php

namespace Analyzen\Auth\Tests\Features;

use Analyzen\Auth\Models\User;
use Analyzen\Auth\Tests\TestCase;

class UserApiTest extends TestCase
{
    public function tests_user_registration()
    {
        $this->withoutExceptionHandling();

        $userData = [
            'name' => "Sakhawat Hossen",
            'email' => 'sakhawathossen42@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];

        $response = $this->postJson(route('user.registration'), $userData);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'name' => 'Sakhawat Hossen',
            'email' => 'sakhawathossen42@gmail.com',
            'is_active' => true,
        ]);
    }
}
