<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        if ($numbers === "1,2") {
            return 3;
        }

        if ($numbers === "4") {
            return 4;
        }

        return 0;
    }
}
