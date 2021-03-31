<?php
require 'YearFormat.php';


class YearException
{
	public static function getErrorCode() :string
	{

		if (isset($_SESSION['year_published'])){
			if ($_SESSION['year_published'] != '') {
				$splitYear = str_split($_SESSION['year_published']);
				if (!is_numeric($_SESSION['year_published'])) {
					$_SESSION['year_published'] = intval($_SESSION['year_published']);
					return 'YEAR_IS_NOT_NUMERIC';
				}

				if (count($splitYear) > 4) {
					return 'YEAR_MORE_THAT_4_DIGITS';
				} else {
					YearFormat::setYear($splitYear);
				}

				if ($_SESSION['year_published'] > date('Y')) {
					return 'YEAR_IS_TOO_LARGE';
				}
			}
		}
		return 0;
	}
}