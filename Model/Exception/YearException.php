<?php
require 'YearFormat.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/ExceptionText.php';


class YearException
{
	public static function getErrorMessage() :array
	{

		if (isset($_SESSION['year_published'])){
			if ($_SESSION['year_published'] != '') {
				$splitYear = str_split($_SESSION['year_published']);
				if (!is_numeric($_SESSION['year_published'])) {
					$_SESSION['year_published'] = intval($_SESSION['year_published']);
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

				if ($_SESSION['year_published'] > date('Y')) {
					return array(
						'MESS' =>
							$GLOBALS['EXCEPT_MESS']['YEAR_IS_TOO_LARGE'],
						'CODE' => 'YEAR_IS_TOO_LARGE');
				}
			}
		}
		return array('MESS' => '', 'CODE' => 0);
	}
}