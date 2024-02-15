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

    public static function simpleCalculatorNotAllowNegativesValues(): array
    {
        return [
            'given_1_2_3_with_negatives_values_return_exception' => ["numbers" => '1,-2,-3', "exceptionMessage" => 'error: negatives not allowed: -2 -3'],
            'given_1_2_with_negatives_values_return_exception' => ["numbers" => '1,-2', "exceptionMessage" => 'error: negatives not allowed: -2'],
            'given_1_2_5_with_negatives_values_return_exception' => ["numbers" => '1,-2,-5', "exceptionMessage" => 'error: negatives not allowed: -2 -5'],
        ];
    }

    public static function simpleCalculatorIgnoreNumbersBiggerThan1000(): array
    {
        return [
            'given_1001_2_string_with_personalized_separator_return_2_int' => ["numbers" => '1001,2', "result" => 2],
            'given_2001_2_3_string_with_personalized_separator_return_2_int' => ["numbers" => '//;\n2001;2;3', "result" => 5],
            'given_8000_1_0_string_with_personalized_separator_return_2_int' => ["numbers" => '//;\n8000;1;0', "result" => 1],
        ];
    }

    public static function simpleCalculatorWithAnyLengthSeparator(): array
    {
        return [
            'given_1_2_3_then_return_6' => ["numbers" => '//[***]\n1***2***3', "result" => 6],
            'given_2_3_then_return_5' => ["numbers" => '//[--]\n2--3', "result" => 5],
            'given_1_1_1_then_return_3' => ["numbers" => '//[tttt]\n1tttt1tttt1', "result" => 3],
        ];
    }

    /**
     * @dataProvider simpleCalculator
     * @dataProvider simpleCalculatorWithNewLines
     * @dataProvider simpleCalculatorWithPersonalizedSeparators
     * @dataProvider simpleCalculatorIgnoreNumbersBiggerThan1000
     * @dataProvider simpleCalculatorWithAnyLengthSeparator
     * @test
     */
    public function given_a_string_then_return_the_sum(string $numbers, int $result): void
    {
        $this->assertEquals($result, StringCalculator::Add($numbers));
    }

    /**
     * @dataProvider simpleCalculatorNotAllowNegativesValues
     * @test
     */
    public function given_a_negative_value_throw_exception(string $numbers, string $exceptionMessage): void
    {
        $this->expectExceptionMessage($exceptionMessage);

        StringCalculator::Add($numbers);
    }

    /**
     * @test
     */
    public function given_1_2_3_then_return_6(): void
    {
        $this->assertEquals(6, StringCalculator::Add('//[*][%]\n1*2%3'));
    }

    /**
     * @test
     */
    public function given_4_2_4_then_return_10(): void
    {
        $this->assertEquals(10, StringCalculator::Add('//[_][/]\n4_2/4'));
    }
}
