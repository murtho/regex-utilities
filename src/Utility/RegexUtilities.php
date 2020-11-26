<?php

/*
 * Author : Maarten Verijdt (murtho@gmail.com)
 */

namespace Murtho\Utility;

/**
 * RegexUtilities
 */
class RegexUtilities
{
    /**
     * Date format pattern
     *
     * This pattern can be used to check if a string matches the format required
     * to create a \DateTime object.
     *
     * The format is 'year-month-day'
     * - year must contain 4 digits i.e. 2000
     * - month must be between 01 and 12
     * - day must be between 01 and 31
     */
    const FORMAT_DATE = "/^\d{4}\-(1[0-2]|0[1-9])\-(3[0-1]|[12][\d]|0[1-9])$/";

    /**
     * Time format pattern
     *
     * This pattern can be used to check if a string matches the format required
     * to create a \DateTime object.
     *
     * The format is 'hour:minute:second'
     * - hour must be between 00 and 23
     * - minute must be between 00 and 59
     * - second must be between 00 and 59
     */
    const FORMAT_TIME = "/^(2[0-3]|[0-1]\d)\:([0-5]\d)\:([0-5]\d)$/";

    /**
     * Date Time format pattern
     *
     * This pattern can be used to check if a string matches the format required
     * to create a \DateTime object.
     *
     * The format is 'year-month-day hour:minute:second'
     */
    const FORMAT_DATE_TIME = "/^\d{4}\-(1[0-2]|0[1-9])\-(3[0-1]|[12][\d]|0[1-9]) (2[0-3]|[0-1]\d)\:([0-5]\d)\:([0-5]\d)$/";

    /**
     * Date Time Interval format pattern
     *
     * This pattern can be used to check if a string matches the format required
     * to create a \DateInterval object.
     *
     * The format is 'P{years}Y{months}M{days}DT{hours}H{minutes}M{seconds}S'
     */
    const FORMAT_DATE_INTERVAL = "/^P{1}(\d+Y)?(\d+M)?(\d+D)?(T(\d+H)?(\d+M)?(\d+S)?)?$/";

    /**
     * Digits format pattern
     *
     * This pattern can be used to check if a string consists of only digits
     */
    const FORMAT_DIGITS = "/^\d+$/";

    /**
     * Matches Pattern
     *
     * @param string $string  The string on with the pattern will be checked
     * @param string $pattern The Regex pattern
     * @return boolean
     */
    public static function matchesPattern(string $string, string $pattern): bool
    {
        return filter_var(
            preg_match($pattern, $string),
            FILTER_VALIDATE_BOOLEAN
        );
    }
}