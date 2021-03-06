<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/Model/Search.php';


if(isset($_SESSION))
{
	$searchFieldNames = $GLOBALS['FIELD_NAME']['SEARCH'];
	foreach ($_SESSION as $filterField => $filterValue){
		if(in_array($filterField, $searchFieldNames)){
			$searchFilter[$filterField] = $filterValue;
		}
	}

	if(isset($searchFilter)){
		$search = new Search($searchFilter);
		$books = $search->getBooks();
	}
}
