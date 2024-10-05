<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->generatePhoneNumber(),
            'address' => $this->faker->address,
        ];
    }

    /**
     * Generate an american phone number
     */
    protected function generatePhoneNumber(): string
    {
        // Generates a phone number in the format +1XXXXXXXXXX
        $countryCode = '+1'; // Country code for USA
        $areaCode = $this->faker->numberBetween(100, 999);
        $numberPart1 = $this->faker->numberBetween(100, 999);
        $numberPart2 = $this->faker->numberBetween(1000, 9999);

        return $countryCode.$areaCode.$numberPart1.$numberPart2;
    }
}
