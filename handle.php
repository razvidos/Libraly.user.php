<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

session_start();

foreach ($_POST as $fieldName => $field)
{
    if(isset($field) || isset($_SESSION[$fieldName]))
    {
		$_SESSION[$fieldName] = $field;
    }
}

if(isset($_SESSION['resetSession']))
	{session_unset();}
