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

    /** @test */
    public function given_a_1_2_string_return_3_int(): void
    {
        $result = StringCalculator::Add("1,2");

        self::assertEquals(3, $result);
    }

    /** @test */
    public function given_a_1_2_3_string_return_6_int(): void
    {
        $result = StringCalculator::Add("1,2,3");

        self::assertEquals(6, $result);
    }

    /** @test */
    public function given_a_1_2_3_4_5_6_7_8_9_string_return_45_int(): void
    {
        $result = StringCalculator::Add("1,2,3,4,5,6,7,8,9");

        self::assertEquals(45, $result);
    }

    /** @test */
    public function given_1_2_3_string_with_another_separator_return_6_int(): void
    {
        $result = StringCalculator::Add('1\n2,3');

        self::assertEquals(6, $result);
    }

    /** @test */
    public function given_1_2_3_4_string_with_another_separator_return_10_int(): void
    {
        $result = StringCalculator::Add('1\n2,3\n4');

        self::assertEquals(10, $result);
    }

    /** @test */
    public function given_1_2_3_4_5_string_with_another_separator_return_15_int(): void
    {
        $result = StringCalculator::Add('1\n2,3\n4,5');

        self::assertEquals(15, $result);
    }

    /** @test */
    public function given_1_2_string_with_personalized_separator_return_3_int(): void
    {
        $result = StringCalculator::Add('//;\n1;2');

        self::assertEquals(3, $result);
    }

    /** @test */
    public function given_1_2_3_string_with_personalized_separator_return_6_int(): void
    {
        $result = StringCalculator::Add('//;\n1;2;3');

        self::assertEquals(6, $result);
    }

    /** @test */
    public function given_1_2_3_4_string_with_personalized_separator_return_10_int(): void
    {
        $result = StringCalculator::Add('//_\n1_2_3_4');

        self::assertEquals(10, $result);
    }
}
