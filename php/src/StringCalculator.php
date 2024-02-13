<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    public static function Add(string $numbers): int
    {
        $numbers = self::parseStringIfHavePersonalizedSeparator($numbers);

        $numbersArray = self::sanitizeString($numbers);

        return self::sumNumbers($numbersArray);
    }

    /**
     * @param array $numbersArray
     * @return int
     */
    public static function sumNumbers(array $numbersArray): int
    {
        $result = 0;

        foreach ($numbersArray as $number) {
            $result += (int)$number;
        }

        return $result;
    }

    /**
     * @param string $numbers
     * @return string[]
     */
    public static function sanitizeString(string $numbers): array
    {
        $formattedNumbers = str_replace('\n', ',', $numbers);
        return explode(',', $formattedNumbers);
    }

    /**
     * @param string $numbers
     * @return array|string|string[]
     */
    public static function parseStringIfHavePersonalizedSeparator(string $numbers): string|array
    {
        $startPosition = strpos($numbers, '//');
        $endPosition = strpos($numbers, '\n');

        if (self::havePersonalizedSeparator($startPosition, $endPosition)) {
            $separatorString = substr($numbers, $startPosition, $endPosition + 2);

            $separator = substr($separatorString, $startPosition + 2, 1);

            $params = substr($numbers, $endPosition + 2, strlen($numbers) - strlen($separatorString));

            $numbers = str_replace($separator, ',', $params);
        }
        return $numbers;
    }

    /**
     * @param bool|int $startPosition
     * @param bool|int $endPosition
     * @return bool
     */
    public static function havePersonalizedSeparator(bool|int $startPosition, bool|int $endPosition): bool
    {
        return $startPosition !== false && $endPosition !== false;
    }
}
