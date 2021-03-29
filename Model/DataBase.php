<?php


class DataBase extends PDO
{
	/**
	 * DataBase constructor.
	 * @param $db
	 */
	public function __construct() {
		$dsn = 'mysql:unix_socket=/tmp/mysql.sock;dbname=Library';
		$username = 'root';
		$password = '1234567z';
		parent::__construct($dsn, $username, $password);
	}

	/**
	 * @param string $sql
	 * @param array $fields
	 * @return false|PDOStatement
	 */
	public function myQuery(string $sql) :bool|PDOStatement
	{
		$sql = $this->prepare($sql);
		$sql->execute();
		return $sql;
	}
}

$DB = new DataBase();
