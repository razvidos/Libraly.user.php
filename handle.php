<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require 'lib/Exception/YearException.php';

session_start();

if(isset($_SESSION['Error message']))
	{$_SESSION['Error message'] = null;}

if(!isset($_POST['resetSession'])){
	foreach ($_POST as $fieldName => $field)
	{
		if(isset($field) || isset($_SESSION[$fieldName]))
		{
			$_SESSION[$fieldName] = $field;
		}
	}

	try {
		$errorMessage = YearException::getErrorMessage();
		if($errorMessage != ''){
			throw new Exception($errorMessage);
		}
	} catch (Exception $exception){
		$_SESSION['Error message'] = $exception->getMessage();
	}
} else {session_unset();}
