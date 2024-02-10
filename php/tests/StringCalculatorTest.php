<?php declare(strict_types=1);

namespace KataTests;

use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function given_a_empty_string_return_0(): void
    {
        $result = StringCalculator::Add("");

        self::assertEquals(0, $result);
    }

    /** @test */
    public function given_a_4_string_return_4_int(): void
    {
        $result = StringCalculator::Add("4");

        self::assertEquals(4, $result);
    }
}
