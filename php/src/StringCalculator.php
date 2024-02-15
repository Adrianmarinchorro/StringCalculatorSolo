<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    const SEPARATOR_LENGTH = 2;

    /**
     * @throws \Exception
     */
    public static function Add(string $numbers): int
    {
        $numbers = self::parseStringIfHavePersonalizedSeparator($numbers);

        $numbersArray = self::sanitizeString($numbers);

        return self::sumNumbers($numbersArray);
    }

    /**
     * @param array $numbersArray
     * @return int
     * @throws \Exception
     */
    private static function sumNumbers(array $numbersArray): int
    {
        $result = 0;

        self::haveValidNumbers($numbersArray);

        foreach ($numbersArray as $number) {
            if (self::isBiggerThan1000($number)) {
                continue;
            }

            $result += (int) $number;
        }

        return $result;
    }

    /**
     * @throws \Exception
     */
    private static function haveValidNumbers(array $numbersArray): void
    {
        $invalidNumbers = '';

        foreach ($numbersArray as $numbers) {
            if ((int) $numbers < 0) {
                $invalidNumbers .= ' ' . $numbers;
            }
        }

        if (!empty($invalidNumbers)) {
            throw new \Exception('error: negatives not allowed:' . $invalidNumbers);
        }
    }

    /**
     * @param string $numbers
     * @return string[]
     */
    private static function sanitizeString(string $numbers): array
    {
        $formattedNumbers = str_replace('\n', ',', $numbers);
        return explode(',', $formattedNumbers);
    }

    /**
     * @param string $numbers
     * @return array|string|string[]
     */
    private static function parseStringIfHavePersonalizedSeparator(string $numbers): string|array
    {
        $startPosition = strpos($numbers, '//');
        $endPosition = strpos($numbers, '\n');

        if (self::havePersonalizedSeparator($startPosition, $endPosition)) {
            $separatorString = substr($numbers, $startPosition, $endPosition + self::SEPARATOR_LENGTH);

            $separator = substr($separatorString, $startPosition + self::SEPARATOR_LENGTH, strlen($separatorString) - (self::SEPARATOR_LENGTH * 2));

            if (strlen($separator) > 1) {
                $separator = substr($separator, 1, -1);
            }

            $params = substr($numbers, $endPosition + self::SEPARATOR_LENGTH, strlen($numbers) - strlen($separatorString));

            $numbers = str_replace($separator, ',', $params);
        }
        return $numbers;
    }

    /**
     * @param bool|int $startPosition
     * @param bool|int $endPosition
     * @return bool
     */
    private static function havePersonalizedSeparator(bool|int $startPosition, bool|int $endPosition): bool
    {
        return $startPosition !== false && $endPosition !== false;
    }

    /**
     * @param mixed $number
     * @return bool
     */
    public static function isBiggerThan1000(mixed $number): bool
    {
        return (int) $number > 1000;
    }
}
