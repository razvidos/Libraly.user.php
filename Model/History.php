<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/14/21
 * Time: 11:56 PM
 */

class History
{
    public static function getList() : array
    {
    	global $DB;
    	global $USER;
		$userID = $USER->getID();
		$dateFormat = '%d %b %H:%i';
		$historyElements = array();
		$sql = "
			SELECT AUTHOR, TITLE, TAG, YEAR_PUBLISHED, 
			       DATE_FORMAT(DATE_FROM, '".$dateFormat."'), 
			       COALESCE(DATE_FORMAT(DATA_TO, '".$dateFormat."'), '') as DATA_TO
			FROM library.history h
			LEFT JOIN library.books b ON h.BOOK_ID = b.ID
			WHERE USER_ID = ".$userID.";";

		$query = $DB->myQuery($sql);
		while ($historyElement = $query->fetch(PDO::FETCH_ASSOC)){
			$historyElements[] = $historyElement;
		}

        return $historyElements;
    }
}