<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        $numbersArray = explode(',', $numbers);
        $result = 0;

        foreach ($numbersArray as $number) {
            $result += (int) $number;
        }

        return $result;
    }
}
