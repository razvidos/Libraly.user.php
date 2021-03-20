<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require 'lib/Search.php';


if(isset($_SESSION))
{
	// get search fields
	$searchFieldNames = FieldsName::getSearchFieldNames();
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
