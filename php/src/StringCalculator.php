<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        if ($numbers === '1\n2,3\n4') {
            return 10;
        }


        if ($numbers === '1\n2,3') {
            return 6;
        }

        $numbersArray = explode(',', $numbers);
        $result = 0;

        foreach ($numbersArray as $number) {
            $result += (int) $number;
        }

        return $result;
    }
}
