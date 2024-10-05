<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class AuthenticationTest
 *
 * This class contains feature tests for user authentication, including login screen rendering,
 * successful and failed login attempts, and user logout functionality.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class AuthenticationTest extends TestCase
{
    const PATH_LOGIN = '/login';

    /**
     * Test that the login screen can be rendered.
     *
     * This method checks that the login page is accessible and returns a 200 status code.
     *
     * @return void
     */
    #[Test]
    public function login_screen_can_be_rendered(): void
    {
        // Make a GET request to the login page
        $response = $this->get(self::PATH_LOGIN);

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Test that users can authenticate using the login screen.
     *
     * This method simulates a login request with valid credentials and checks that the user is authenticated
     * and redirected to the dashboard.
     *
     * @return void
     */
    #[Test]
    public function users_can_authenticate_using_the_login_screen(): void
    {
        // Create a user instance
        $user = User::factory()->create();

        // Simulate a POST request to log in with valid credentials
        $response = $this->post(self::PATH_LOGIN, [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Assert that the response redirects to the dashboard
        $response->assertRedirect(route('dashboard', false));
    }

    /**
     * Test that users cannot authenticate with an invalid password.
     *
     * This method simulates a login attempt with a wrong password and checks that the user is not authenticated.
     *
     * @return void
     */
    #[Test]
    public function users_can_not_authenticate_with_invalid_password(): void
    {
        // Create a user instance
        $user = User::factory()->create();

        // Simulate a POST request to log in with an invalid password
        $this->post(self::PATH_LOGIN, [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        // Assert that the user is not authenticated
        $this->assertGuest();
    }

    /**
     * Test that users can log out.
     *
     * This method simulates a logout request and checks that the user is logged out and redirected to the home page.
     *
     * @return void
     */
    #[Test]
    public function users_can_logout(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Simulate the user being logged in and then logging out
        $response = $this->actingAs($user)->post('/logout');

        // Assert that the user is logged out
        $this->assertGuest();

        // Assert that the response redirects to the home page
        $response->assertRedirect('/');
    }
}
