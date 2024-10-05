<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class DatabaseTest
 *
 * This class contains feature tests related to the database environment configuration.
 * It ensures that the application is running in the testing environment during test execution.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class DatabaseTest extends TestCase
{
    /**
     * Verifies that the application environment is set to 'testing'.
     *
     * @return void
     */
    #[Test]
    public function it_is_testing_environment(): void
    {
        // Assert that the current environment is 'testing'
        $this->assertEquals('testing', env('APP_ENV'));
    }
}
