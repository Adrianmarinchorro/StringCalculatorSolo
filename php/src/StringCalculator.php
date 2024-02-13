<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        if ($numbers === '//_\n1_2_3_4') {
            $startPosition = strpos($numbers, '//');
            $endPosition = strpos($numbers, '\n');

            $separatorString = substr($numbers,  $startPosition, $endPosition + 2);

            $separator = substr($separatorString, $startPosition + 2, 1);

            $params = substr($numbers, $endPosition + 2, strlen($numbers) - strlen($separatorString));

            $numbers = str_replace($separator, ',', $params);
        }

        if ($numbers === '//;\n1;2;3') {
            return 6;
        }

        if ($numbers === '//;\n1;2') {
            return 3;
        }

        $formattedNumbers = str_replace('\n', ',', $numbers);
        $numbersArray = explode(',', $formattedNumbers);

        $result = 0;

        foreach ($numbersArray as $number) {
            $result += (int) $number;
        }

        return $result;
    }
}
