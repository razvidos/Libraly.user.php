<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require $_SERVER['DOCUMENT_ROOT']. '/lib/Exception/YearException.php';

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
		$error = YearException::getErrorMessage();
		if($error['MESS'] != ''){
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
