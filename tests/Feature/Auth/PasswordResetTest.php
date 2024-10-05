<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class PasswordResetTest
 *
 * This class contains feature tests for the password reset process, including rendering the forgot
 * password screen, requesting a password reset link, rendering the reset password screen, and resetting the password.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class PasswordResetTest extends TestCase
{
    const PATH_FORGOT_PASSWORD = '/forgot-password';

    /**
     * Test that the reset password link screen can be rendered.
     *
     * This method makes a request to the "forgot password" page and asserts that the page is rendered
     * with a 200 status code.
     *
     * @return void
     */
    #[Test]
    public function reset_password_link_screen_can_be_rendered(): void
    {
        // Make a request to the forgot password page
        $response = $this->get(self::PATH_FORGOT_PASSWORD);

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Test that a reset password link can be requested.
     *
     * This method simulates requesting a password reset link by submitting a user's email address
     * and asserts that a ResetPassword notification is sent to the user.
     *
     * @return void
     */
    #[Test]
    public function reset_password_link_can_be_requested(): void
    {
        // Fake notifications to prevent actual emails from being sent
        Notification::fake();

        // Create a new user
        $user = User::factory()->create();

        // Simulate requesting a password reset link for the user's email
        $this->post(self::PATH_FORGOT_PASSWORD, ['email' => $user->email]);

        // Assert that a ResetPassword notification was sent to the user
        Notification::assertSentTo($user, ResetPassword::class);
    }

    /**
     * Test that the reset password screen can be rendered.
     *
     * This method submits a request for a password reset link and then simulates accessing the reset
     * password page using the token from the ResetPassword notification. It asserts that the page is rendered with a 200 status code.
     *
     * @return void
     */
    #[Test]
    public function reset_password_screen_can_be_rendered(): void
    {
        // Fake notifications to prevent actual emails from being sent
        Notification::fake();

        // Create a new user
        $user = User::factory()->create();

        // Simulate requesting a password reset link
        $this->post(self::PATH_FORGOT_PASSWORD, ['email' => $user->email]);

        // Assert that a ResetPassword notification was sent and retrieve the token from the notification
        Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
            // Simulate accessing the reset password page with the token
            $response = $this->get('/reset-password/' . $notification->token);

            // Assert that the response status is 200 (OK)
            $response->assertStatus(200);

            return true;
        });
    }

    /**
     * Test that a password can be reset with a valid token.
     *
     * This method submits a request for a password reset link, then simulates resetting the password
     * using the token from the ResetPassword notification, and asserts that the reset process completes without errors.
     *
     * @return void
     */
    #[Test]
    public function password_can_be_reset_with_valid_token(): void
    {
        // Fake notifications to prevent actual emails from being sent
        Notification::fake();

        // Create a new user
        $user = User::factory()->create();

        // Simulate requesting a password reset link
        $this->post(self::PATH_FORGOT_PASSWORD, ['email' => $user->email]);

        // Assert that a ResetPassword notification was sent and reset the password using the token
        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            // Simulate resetting the password using the token and new password details
            $response = $this->post('/reset-password', [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            // Assert that the session has no errors and the response redirects to the login page
            $response
                ->assertSessionHasNoErrors()
                ->assertRedirect(route('login'));

            return true;
        });
    }
}
