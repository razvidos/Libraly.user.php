<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/14/21
 * Time: 11:56 PM
 */

class Booking
{

    public static function add($bookID)
    {
		global $DB;
		global $USER;
		$userID = $USER->getID();
		$sql = "
		INSERT INTO library.history (BOOK_ID, USER_ID)
		    VALUE ('".$bookID."', '".$userID."');";
		$DB->myQuery($sql);
    }

    public static function remove($bookID)
    {
		global $DB;
		global $USER;
		$userID = $USER->getID();
		$sql = "
		UPDATE library.history
		    SET DATA_TO = CURRENT_TIMESTAMP()
		WHERE USER_ID = ".$userID."
		  AND BOOK_ID = ".$bookID."
		  AND DATA_TO is null
		;";
		$DB->myQuery($sql);
    }

    public static function getList(): array
    {
		$bookingList = array();
		global $DB;
		global $USER;
		$userID = $USER->getID();
		$sql = "
			SELECT BOOK_ID 
			FROM library.history
			WHERE USER_ID = ".$userID."
			AND DATA_TO is null;";

		$query = $DB->myQuery($sql);

		while ($bookResult = $query->fetch()) {
			$bookingList[] = $bookResult['BOOK_ID'];
		}

		return $bookingList;
    }
}