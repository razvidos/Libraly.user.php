<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require 'lib/Booking.php';
require 'handle.php';

if(isset($filter['bookingID']))
    {Booking::add($filter['bookingID']);}

if(isset($filter['unbookID']))
    {Booking::remove($filter['unbookID']);}

$booking = Booking::getList();

include 'view.php';
