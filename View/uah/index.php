<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */

session_start();

$_SESSION['language'] = 'uah';
require $_SERVER['DOCUMENT_ROOT'] . '/View/view.php';