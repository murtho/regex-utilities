<?php

/*
 * Author : Maarten Verijdt (murtho@gmail.com)
 */

namespace Murtho\Tests\Unit\Utility;

use Murtho\Utility\RegexUtilities;
use PHPUnit\Framework\TestCase;

/**
 * RegexUtilitiesTest
 */
final class RegexUtilitiesTest extends TestCase
{
    /**
     * @param string $string
     * @param string $pattern
     * @param boolean $expectedOutput
     *
     * @test
     * @dataProvider providePatternMatchesData
     */
    public function patternMatches(string $string, string $pattern, bool $expectedOutput)
    {
        $output = RegexUtilities::matchesPattern($string, $pattern);

        static::assertEquals($expectedOutput, $output);
        static::assertIsBool($output);
    }

    /**
     * @return array
     */
    public function providePatternMatchesData(): array
    {
        return [
            ["2010-10-10", RegexUtilities::FORMAT_DATE, true],
            ["1999-99-99", RegexUtilities::FORMAT_DATE, false],
            ["2020-02-02", "/^\d{4}-\d{2}-\d{2}$/", true],
            ["2012-12-12", "/^\d{4}-\d{2}-\d{2}$/", true],
            ["12:34:56", RegexUtilities::FORMAT_TIME, true],
            ["25:99:99", RegexUtilities::FORMAT_TIME, false],
            ["2010-10-10 12:34:56", RegexUtilities::FORMAT_DATE_TIME, true],
            ["1999-99-99 25:99:99", RegexUtilities::FORMAT_DATE_TIME, false],
            ["1234567890", "/^\d{4}-\d{2}-\d{2}$/", false],
            ["now", "/^\d{4}-\d{2}-\d{2}$/", false],
            ["lowercase", "/^[a-z]+$/", true],
            ["lowercase", "/^[A-Z]+$/", false],
            ["CAPITALS", "/^[A-Z]+$/", true],
            ["CAPITALS", "/^[a-z]+$/", false],
            ["string", RegexUtilities::FORMAT_DIGITS, false],
            ["null", RegexUtilities::FORMAT_DIGITS, false],
            ["007", RegexUtilities::FORMAT_DIGITS, true],
            ["1986", RegexUtilities::FORMAT_DIGITS, true],
            ["0.5", RegexUtilities::FORMAT_DIGITS, false],
            ["-0.5", RegexUtilities::FORMAT_DIGITS, false],
            ["-5", RegexUtilities::FORMAT_DIGITS, false],
            ["2.71828", RegexUtilities::FORMAT_DIGITS, false],
            ["3,14159", RegexUtilities::FORMAT_DIGITS, false],
            ["string", RegexUtilities::FORMAT_INTEGER, false],
            ["null", RegexUtilities::FORMAT_INTEGER, false],
            ["007", RegexUtilities::FORMAT_INTEGER, false],
            ["1986", RegexUtilities::FORMAT_INTEGER, true],
            ["0.5", RegexUtilities::FORMAT_INTEGER, false],
            ["-0.5", RegexUtilities::FORMAT_INTEGER, false],
            ["-5", RegexUtilities::FORMAT_INTEGER, true],
            ["2.71828", RegexUtilities::FORMAT_INTEGER, false],
            ["3,14159", RegexUtilities::FORMAT_INTEGER, false],
            ["string", RegexUtilities::FORMAT_FLOAT, false],
            ["null", RegexUtilities::FORMAT_FLOAT, false],
            ["007", RegexUtilities::FORMAT_FLOAT, false],
            ["1986", RegexUtilities::FORMAT_FLOAT, true],
            ["0.5", RegexUtilities::FORMAT_FLOAT, true],
            ["-0.5", RegexUtilities::FORMAT_FLOAT, true],
            ["-5", RegexUtilities::FORMAT_FLOAT, true],
            ["2.71828", RegexUtilities::FORMAT_FLOAT, true],
            ["3,14159", RegexUtilities::FORMAT_FLOAT, false],
            ["P2Y", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["P4M", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["P7D", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["PT12H", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["PT15M", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["PT20S", RegexUtilities::FORMAT_DATE_INTERVAL, true],
            ["2Y", RegexUtilities::FORMAT_DATE_INTERVAL, false],
            ["4M", RegexUtilities::FORMAT_DATE_INTERVAL, false],
            ["7D", RegexUtilities::FORMAT_DATE_INTERVAL, false],
            ["T12H", RegexUtilities::FORMAT_DATE_INTERVAL, false],
            ["T15M", RegexUtilities::FORMAT_DATE_INTERVAL, false],
            ["T20S", RegexUtilities::FORMAT_DATE_INTERVAL, false],
        ];
    }
}