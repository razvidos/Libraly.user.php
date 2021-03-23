<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require $_SERVER['DOCUMENT_ROOT']. '/Model/Booking.php';

if(isset($_SESSION['bookingID']) && !in_array($_SESSION['bookingID'], Booking::getList())) {
	Booking::add($_SESSION['bookingID']);
	unset($_SESSION['bookingID']);
    }

if(isset($_SESSION['unbookingID']) && in_array($_SESSION['unbookingID'], Booking::getList())) {
	Booking::remove($_SESSION['unbookingID']);
	unset($_SESSION['unbookingID']);
}
