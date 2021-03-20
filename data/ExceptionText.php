<?php


class ExceptionText
{
	private static string $yearMoreThat4Digits =
		'Too many numbers for the year field.\n'
		.'Must be over 4 numbers.';
	private static string $yearLessThan2Digits =
		'Too few numbers for the year field.\n'
		.'There must be at least 2 digits.';
	private static string $yearIsNotNumeric =
		'Year must be the numeric.\n'
		.'The year has been converted to numeric.';
	private static string $yearIsTooLarge =
		'Year field is too large.\n'
		.'The year must be less than the current one.';

	/**
	 * @return string
	 */
	public static function getYearMoreThat4Digits() :string
	{
		return self::$yearMoreThat4Digits;
	}

	/**
	 * @return string
	 */
	public static function getYearIsNotNumeric() :string
	{
		return self::$yearIsNotNumeric;
	}

	/**
	 * @return string
	 */
	public static function getYearLessThan2Digits() :string
	{
		return self::$yearLessThan2Digits;
	}

	/**
	 * @return string
	 */
	public static function getYearIsTooLarge() :string
	{
		return self::$yearIsTooLarge;
	}
}