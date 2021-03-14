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

    public function getBooks(){
        $filter = $this->filter;


        $books["booking"] = array();
        foreach ($filter as $fieldName => $field){
            if(in_array($fieldName, array('bookID', 'bookingBooks'))){
                $fieldArray = explode(",",$field);
                $books["booking"] = array_merge($books["booking"], $fieldArray);
                continue;
            }
            if($fieldName == 'unbookID'){
                $delKey = array_search($field, $books["booking"]);
                unset($books["booking"][$delKey]);
                continue;
            }
            $books["all"][] = array("ID" => $field, "VALUE" => $field);
        }

        $books["booking"] = array_unique($books["booking"]);
        return $books;
    }
}

