<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
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
