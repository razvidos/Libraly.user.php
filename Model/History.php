<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/14/21
 * Time: 11:56 PM
 */

class History
{
	/**
	 * @return array - information about booking.
	 *
	 * AUTHOR, TITLE, TAG, YEAR_PUBLISHED, DATE_FROM DATA_TO
	 */
	public static function getList() : array
    {
		global $DB;
		global $USER;
		$userID = $USER->getID();
		$historyElements = array();
		$dateFormat = array(
			'uah' => '%d %b %H:%i',
			'eng' => '%b %d %H:%i');
		$sql = "
			SELECT AUTHOR, TITLE, TAG, YEAR_PUBLISHED, 
			       DATE_FORMAT(DATE_FROM, '".$dateFormat[$_SESSION['language']]."'), 
			       COALESCE(DATE_FORMAT(DATA_TO, '".$dateFormat[$_SESSION['language']]."'), '') as DATA_TO
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