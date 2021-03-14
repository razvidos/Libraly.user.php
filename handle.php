<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

include 'Search.php';

foreach ($_GET as $fieldName => $field) {
    if($field != ''){
        $filter[$fieldName] = $field;
    }
}
if(isset($filter)){
    $search = new Search($filter);
    $books = $search->getBooks();
}

include 'view.php';
