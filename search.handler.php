<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

require 'lib/Search.php';
require 'handle.php';

if(isset($filter))
{
    $search = new Search($filter);
    $books = $search->getBooks();
}

include 'view.php';
