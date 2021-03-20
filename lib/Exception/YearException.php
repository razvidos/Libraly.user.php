<?php
require $_SERVER['DOCUMENT_ROOT'].'/format/YearFormat.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/ExceptionText.php';


class YearException
{
	public static function getErrorMessage() :array
	{

		if ($_SESSION['yearPublished'] != '') {
			$splitYear = str_split($_SESSION['yearPublished']);
			if (!is_numeric($_SESSION['yearPublished'])) {
				$_SESSION['yearPublished'] = intval($_SESSION['yearPublished']);
				return array(
					'MESS' =>
						$GLOBALS['EXCEPT_MESS']['YEAR_IS_NOT_NUMERIC'],
					'CODE' => 'YEAR_IS_NOT_NUMERIC');
			}

			if (count($splitYear) > 4) {
				return array(
					'MESS' =>
						$GLOBALS['EXCEPT_MESS']['YEAR_MORE_THAT_4_DIGITS'],
					'CODE' => 'YEAR_MORE_THAT_4_DIGITS');
			} else {
				YearFormat::setYear($splitYear);
			}

			if ($_SESSION['yearPublished'] > date('Y')) {
				return array(
					'MESS' =>
						$GLOBALS['EXCEPT_MESS']['YEAR_IS_TOO_LARGE'],
					'CODE' => 'YEAR_IS_TOO_LARGE');
			}
		}
		return array('MESS' => '', 'CODE' => 0);
	}
}