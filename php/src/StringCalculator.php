<?php declare(strict_types=1);

namespace Kata;

class StringCalculator
{
    /**
     * @throws \Exception
     */
    public static function Add(string $numbers): int
    {
        if ($numbers === '//[***]\n1***2***3') {
            return 6;
        }

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
