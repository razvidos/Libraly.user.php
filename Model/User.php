<?php


class User
{
	private int $id;


	public function __construct(){
		global $DB;
		$session_id = session_id();
		$ipAddress = $_SERVER['REMOTE_ADDR'];

		$sql = "
			SELECT USER_ID 
			FROM library.users
			WHERE SESSION_ID = '".$session_id."'
			  AND IP_ADDRESS = '".$ipAddress."';";

		$query = $DB->myQuery($sql);
		$result = $query->fetch();
		if(!isset($result['USER_ID'])) {
			$sql = "
			INSERT INTO library.users (SESSION_ID, IP_ADDRESS)
		    VALUE ('".$session_id."', '".$ipAddress."');";
			$DB->myQuery($sql);
			$this->id = $DB->lastInsertId();
		} else {
			$this->id = $result['USER_ID'];
		}
	}
	public function getID() :int
	{
		return $this->id;
	}
}
$USER = new User();
