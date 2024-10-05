<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Faker\Factory as Faker;

/**
 * Class RegistrationTest
 *
 * This class contains feature tests for the user registration functionality, including
 * rendering the registration screen and allowing new users to register.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class RegistrationTest extends TestCase
{
    /**
     * Test that the registration screen can be rendered.
     *
     * This method simulates a request to the registration page and asserts that it returns a 200 status, indicating the page is displayed correctly.
     *
     * @return void
     */
    #[Test]
    public function registration_screen_can_be_rendered(): void
    {
        // Make a GET request to the registration page
        $response = $this->get('/register');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Test that new users can register.
     *
     * This method uses Faker to create a fake name and email, and simulates a registration request. It asserts that the user is authenticated and redirected to the dashboard upon successful registration.
     *
     * @return void
     */
    #[Test]
    public function new_users_can_register(): void
    {
        // Create an instance of Faker for generating random user data
        $faker = Faker::create();

        // Generate a random password
        $password = $faker->password;

        // Simulate a POST request to register a new user with the generated data
        $response = $this->post('/register', [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Assert that the response redirects to the dashboard
        $response->assertRedirect(route('dashboard', false));
    }
}
