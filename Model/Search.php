<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 7:45 PM
 */

class Search
{
	private array $filter;


    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function getBooks(): array
    {
    	global $DB;
        $filter = $this->filter;
		$books = array();

		$sql = "
			SELECT ID, TITLE, AUTHOR 
			FROM books ";
		$where =
			"WHERE 1=1\n";
		foreach ($filter as $fieldName => $value){
			$where .= "AND " .strtoupper($fieldName)
				. " LIKE '%"
				.$value. "%'";
		}

		$query = $DB->myQuery($sql.$where);
		$booksResults = $query->fetchAll();

		foreach ($booksResults as $booksResult){
			$books[] = array(
				"ID" => $booksResult['ID'],
				"VALUE" => $booksResult['TITLE']. " - " .$booksResult['AUTHOR']);

		}
        return $books;
    }
}

