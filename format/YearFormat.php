<?php


class YearFormat
{
	public static function setYear($splitYear)
	{
		if (count($splitYear) == 1) {
			$_SESSION['yearPublished'] = '200' . $_SESSION['yearPublished'];
		}
		if (count($splitYear) == 2) {
			if ($_SESSION['yearPublished'] > date('y')){
				$_SESSION['yearPublished'] = '19'. $_SESSION['yearPublished'];
			} else {
				$_SESSION['yearPublished'] = '20'. $_SESSION['yearPublished'];
			}
		} elseif (count($splitYear) == 3){
			if ($_SESSION['yearPublished'] > date('y')){
				$_SESSION['yearPublished'] = '1'. $_SESSION['yearPublished'];
			} else {
				$_SESSION['yearPublished'] = '2'. $_SESSION['yearPublished'];
			}
		}
	}
}