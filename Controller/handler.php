<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */


session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/Model/Exception/YearException.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Model/DataBase.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';

global $USER;

$userID = $USER->getID();

if(!isset($_POST['resetSession'])){
	foreach ($_POST as $fieldName => $field)
	{
		if(isset($field) || isset($_SESSION[$fieldName]))
		{
			$_SESSION[$fieldName] = $field;
		}
	}

	try {
		$error = YearException::getErrorMessage();
		if($error['CODE'] != 0){
			$logFile = fopen(
				$_SERVER['DOCUMENT_ROOT'].'/logs/log.txt',
				'a');
			$data =
				date("Y-m-d H:i:s\t")
				.$_SERVER['USER']
				. '@'
				.$_SERVER['REMOTE_ADDR']
				. "\t"
				.$error['CODE']
				. "\n";
			fwrite($logFile, $data);
			fclose($logFile);
			throw new Exception($error['MESS']);
		}
	} catch (Exception $exception){
		$_SESSION['Error message'] = $exception->getMessage();
	}
} else {session_unset();}
