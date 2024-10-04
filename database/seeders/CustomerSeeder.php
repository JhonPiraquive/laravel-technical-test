<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

/**
 * Feed database with customer information
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 03, 2024
 */
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory(10)->create();
    }
}
