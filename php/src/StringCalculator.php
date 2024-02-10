<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        $formattedNumbers = str_replace('\n', ',', $numbers);
        $numbersArray = explode(',', $formattedNumbers);

        $result = 0;

        foreach ($numbersArray as $number) {
            $result += (int) $number;
        }

        return $result;
    }
}
