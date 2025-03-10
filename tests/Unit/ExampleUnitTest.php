<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_addition_function()
    {
        $sum = 2 + 3;
        $this->assertEquals(5, $sum);
    }
}
