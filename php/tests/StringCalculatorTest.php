<?php declare(strict_types=1);

namespace KataTests;

use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{

    public static function simpleCalculator(): array
    {
        return [
            'given_a_empty_string_return_0' => ["numbers" => '', "result" => 0],
            'given_a_4_string_return_4_int' => ["numbers" => '4', "result" => 4],
            'given_a_1_2_string_return_3_int' => ["numbers" => '1,2', "result" => 3],
            'given_a_1_2_3_4_5_6_7_8_9_string_return_45_int' => ["numbers" => '1,2,3,4,5,6,7,8,9', "result" => 45],
        ];
    }

    public static function simpleCalculatorWithNewLines(): array
    {
        return [
            'given_1_2_3_string_with_another_separator_return_6_int' => ["numbers" => '1\n2,3', "result" => 6],
            'given_1_2_3_4_string_with_another_separator_return_10_int' => ["numbers" => '1\n2,3\n4', "result" => 10],
            'given_1_2_3_4_5_string_with_another_separator_return_15_int' => ["numbers" => '1\n2,3\n4,5', "result" => 15],
        ];
    }

    public static function simpleCalculatorWithPersonalizedSeparators(): array
    {
        return [
            'given_1_2_string_with_personalized_separator_return_3_int' => ["numbers" => '//;\n1;2', "result" => 3],
            'given_1_2_3_string_with_personalized_separator_return_6_int' => ["numbers" => '//;\n1;2;3', "result" => 6],
            'given_1_2_3_4_string_with_personalized_separator_return_10_int' => ["numbers" => '//_\n1_2_3_4', "result" => 10],
        ];
    }

    /**
     * @dataProvider simpleCalculator
     * @dataProvider simpleCalculatorWithNewLines
     * @dataProvider simpleCalculatorWithPersonalizedSeparators
     * @test
     */
    public function given_a_string_then_return_the_sum(string $numbers, int $result): void
    {
        $this->assertEquals($result, StringCalculator::Add($numbers));
    }

    /**
     * @test
     */
    public function given_1_2_3_with_negatives_values_return_exception(): void
    {
        $this->expectException('error: negatives not allowed: -2 -3');

        StringCalculator::Add('1,-2,-3');

    }
}
