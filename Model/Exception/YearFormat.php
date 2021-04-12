<?php


class YearFormat
{
	/**
	 * @param $splitYear
	 * /return int year in 4digit format
	 * /example setYear 1995, 2009
	 * 123123
	 */
	public static function setYear($splitYear) :int
	{
		if (count($splitYear) == 1) {
			$_SESSION['year_published'] = '200' . $_SESSION['year_published'];
		}
		if (count($splitYear) == 2) {
			if ($_SESSION['year_published'] > date('y')){
				$_SESSION['year_published'] = '19'. $_SESSION['year_published'];
			} else {
				$_SESSION['year_published'] = '20'. $_SESSION['year_published'];
			}
		} elseif (count($splitYear) == 3){
			if ($_SESSION['year_published'] > date('y')){
				$_SESSION['year_published'] = '1'. $_SESSION['year_published'];
			} else {
				$_SESSION['year_published'] = '2'. $_SESSION['year_published'];
			}
		}
	}
}