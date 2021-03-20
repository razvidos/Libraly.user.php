<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require 'lib/Booking.php';

if(isset($_SESSION['bookingID']))
    {Booking::add($_SESSION['bookingID']);}

if(isset($_SESSION['unbookingID']))
    {Booking::remove($_SESSION['unbookingID']);}

$booking = Booking::getList();
