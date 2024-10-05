<?php

namespace Tests\Feature\Models;

use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Faker\Factory as Faker;

/**
 * Class CustomerTest
 *
 * This class contains feature tests for managing customers, including displaying customer pages,
 * creating, updating, viewing, and deleting customers.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class CustomerTest extends TestCase
{
    /**
     * Test that the customer index page is displayed successfully.
     *
     * This method verifies that the authenticated user can access the customer index page.
     *
     * @return void
     */
    #[Test]
    public function customer_page_is_displayed(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the created user and make a request to the customer index
        $response = $this->actingAs($user)->get(route('customer.index'));

        // Assert that the response is OK
        $response->assertOk();
    }

    /**
     * Test that a customer can be created.
     *
     * This method creates a customer and checks that the customer creation redirects to the correct route.
     *
     * @return void
     */
    #[Test]
    public function customer_can_be_created(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Create customer data without saving it to the database
        $customer = Customer::factory(1)->make()->first()->getAttributes();

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the user and post the customer data
        $response = $this->actingAs($user)->post(route('customer.store'), $customer);

        // Assert the response redirects to the customer index
        $response->assertRedirect(route('customer.index'));
    }

    /**
     * Test that the customer edit page is displayed successfully.
     *
     * This method verifies that the authenticated user can access the customer edit page.
     *
     * @return void
     */
    #[Test]
    public function customer_edit_page_is_displayed(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Create and persist a customer
        $customer = Customer::factory(1)->create()->first();

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the user and access the customer edit page
        $response = $this->actingAs($user)->get(route('customer.edit', ['customer' => $customer->id]));

        // Assert that the response is OK
        $response->assertOk();
    }

    /**
     * Test that a customer can be updated.
     *
     * This method updates customer information and checks that the session contains the correct status and the user is redirected.
     *
     * @return void
     */
    #[Test]
    public function customer_can_be_updated(): void
    {
        $faker = Faker::create();

        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Create and persist a customer
        $customer = Customer::factory(1)->create()->first();

        // Update the customer name with fake data
        $customer->name = $faker->name;

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the user and update the customer
        $response = $this->actingAs($user)->patch(route('customer.update', ['customer' => $customer->id]), $customer->getAttributes());

        // Assert the response redirects back and session has 'status' with 'customer-updated'
        $response->assertRedirect();
        $response->assertSessionHas('status', 'customer-updated');
    }

    /**
     * Test that the customer view page is displayed successfully.
     *
     * This method verifies that the authenticated user can access the customer view page.
     *
     * @return void
     */
    #[Test]
    public function customer_view_page_is_displayed(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Create and persist a customer
        $customer = Customer::factory(1)->create()->first();

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the user and access the customer view page
        $response = $this->actingAs($user)->get(route('customer.view', ['customer' => $customer->id]));

        // Assert that the response is OK
        $response->assertOk();
    }

    /**
     * Test that a customer can be deleted.
     *
     * This method deletes a customer and checks that the user is redirected to the customer index page.
     *
     * @return void
     */
    #[Test]
    public function customer_can_be_deleted(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Create and persist a customer
        $customer = Customer::factory(1)->create()->first();

        // Assert the user is an instance of Authenticatable
        $this->assertInstanceOf(\Illuminate\Contracts\Auth\Authenticatable::class, $user);

        // Act as the user and delete the customer
        $response = $this->actingAs($user)->delete(route('customer.delete', ['customer' => $customer->id]));

        // Assert the response redirects to the customer index page
        $response->assertRedirect(route('customer.index'));
    }
}
