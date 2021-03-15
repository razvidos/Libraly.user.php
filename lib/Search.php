<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 7:45 PM
 */

class Search
{
    private $filter;


    public function __construct($filter){
        $this->filter = $filter;
    }

    public function getBooks(): array
    {
//        $filter = $this->filter;

        $books[] = array("ID" => 'id', "VALUE" => 'value');

        return $books;
    }
}

