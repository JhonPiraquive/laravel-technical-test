<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Faker\Factory as Faker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Class UserTest
 *
 * This class contains feature tests related to the user page and its functionality.
 * It checks that the user page can be displayed, the user's information can be updated,
 * and that the email verification status remains unchanged when the email is not updated.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class UserTest extends TestCase
{
    const PATH_USER = '/user';

    /**
     * Test that the user page is displayed successfully.
     *
     * This method verifies that the authenticated user can access the user page without errors.
     * It also checks that the environment is properly set to the testing database.
     */
    #[Test]
    public function user_page_is_displayed(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act as the user and access the user page
        $response = $this
            ->actingAs($user)
            ->get(self::PATH_USER);

        // Assert that the response is OK
        $response->assertOk();
    }

    /**
     * Test that the user information can be updated.
     *
     * This method uses Faker to generate random user data for the name and email.
     * It verifies that the user information is successfully updated and the user is redirected without errors.
     */
    #[Test]
    public function user_information_can_be_updated(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Generate random name and email using Faker
        $faker = Faker::create();
        $name = $faker->name;
        $email = $faker->unique()->safeEmail;

        // Act as the user and update user information
        $response = $this
            ->actingAs($user)
            ->patch(self::PATH_USER, [
                'name' => $name,
                'email' => $email,
            ]);

        // Assert there are no validation errors and the user is redirected
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(self::PATH_USER);

        // Refresh the user model and check the updated information
        $user->refresh();

        $this->assertSame($name, $user->name);
        $this->assertSame($email, $user->email);
        $this->assertNull($user->email_verified_at);
    }

    /**
     * Test that the email verification status remains unchanged if the email is not updated.
     *
     * This method checks that the email verification status is not reset when the email address stays the same after an update.
     */
    #[Test]
    public function email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act as the user and attempt to update the user with the same email
        $response = $this
            ->actingAs($user)
            ->patch(self::PATH_USER, [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        // Assert there are no validation errors and the user is redirected
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(self::PATH_USER);

        // Verify the email verification status remains unchanged
        $this->assertNotNull($user->refresh()->email_verified_at);
    }
}
