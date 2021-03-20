<?php
require $_SERVER['DOCUMENT_ROOT'].'/format/YearFormat.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/ExceptionText.php';

class YearException
{
	public static function getErrorMessage() :string
	{
		if ($_SESSION['yearPublished'] != '') {
			$splitYear = str_split($_SESSION['yearPublished']);
			if (!is_numeric($_SESSION['yearPublished'])) {
				$_SESSION['yearPublished'] = intval($_SESSION['yearPublished']);
				return ExceptionText::getYearIsNotNumeric();
			}

			if (count($splitYear) > 4) {
				return ExceptionText::getYearMoreThat4Digits();
			} else {
				YearFormat::setYear($splitYear);
			}

			if ($_SESSION['yearPublished'] > date('Y')) {
				return ExceptionText::getYearIsTooLarge();
			}
		}
		return '';
	}
}