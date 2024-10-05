<?php

namespace Tests;

use Dotenv\Dotenv;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * This abstract class serves as the base test case for all feature tests.
 * It includes database refresh capabilities and loads the environment configuration
 * from the `.env.testing` file for testing purposes.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    /**
     * Set up the testing environment.
     *
     * This method is called before each test. It loads the environment variables from
     * the `.env.testing` file if it exists, runs database migrations, and seeds the database.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (file_exists(base_path('.env.testing'))) {
            Dotenv::createImmutable(base_path(), '.env.testing')->load();
        }

        $this->artisan('migrate');
        $this->artisan('db:seed');
    }
}
