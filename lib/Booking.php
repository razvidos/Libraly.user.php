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
		$_SESSION['bookingList'][$bookID] = $bookID;
    }

    public static function remove($bookID)
    {
		unset($_SESSION['bookingList'][$bookID]);
		$_SESSION['unbookingID'] = null;
    }

    public static function getList(): array
    {
		if (!isset($_SESSION['bookingList']))
        	return array('null' => 'array');
		return $_SESSION['bookingList'];
    }
}