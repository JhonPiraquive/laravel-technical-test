<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Class PasswordUpdateTest
 *
 * This class contains feature tests for updating a user's password, including validating
 * the current password and ensuring the new password is correctly updated.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class PasswordUpdateTest extends TestCase
{
    const PATH_USER = '/user';

    const PATH_PASSWORD = '/password';

    /**
     * Test that a user's password can be updated.
     *
     * This method simulates a password update request, where the current password is verified and
     * the new password is applied. It asserts that no errors occur during the process and that the password is updated successfully.
     */
    #[Test]
    public function password_can_be_updated(): void
    {
        // Create a user with a hashed password
        /** @var \App\Models\User $user */
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        // Simulate updating the password by submitting the current and new passwords
        $response = $this
            ->actingAs($user) // Act as the created user
            ->from(self::PATH_USER) // Simulate coming from the user page
            ->put(self::PATH_PASSWORD, [ // Make a PUT request to update the password
                'current_password' => 'password', // Current password
                'password' => 'new-password', // New password
                'password_confirmation' => 'new-password', // Confirm new password
            ]);

        // Assert that the session has no errors and the response redirects to the user page
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(self::PATH_USER);

        // Assert that the new password has been correctly hashed and stored in the database
        $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    }
}
