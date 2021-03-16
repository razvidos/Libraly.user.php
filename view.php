<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */

class View
{
    private $formFields = array('author', 'name', 'tag', 'yearPublished');
    private $timeFields = array('date from', 'date to');
    private $bookingList;
    private $historyList;
    
    public function __construct()
    {
        $this->bookingList = Booking::getList();
        $this->historyList = History::getList();
    }
    
    public function insertSearchForm($filter)  // from search.handle
    {
        $formFields = $this->formFields;
        foreach ($formFields as $formFieldName){
            echo "<lable>".ucfirst($formFieldName)."</lable><br>
                        <input type='text' name='".$formFieldName."' value='".$filter[$formFieldName]."'><br><br>";
        }
    }

    public function insertBookingList($books)  // from search.handle
    {
        $bookingList = $this->bookingList;
        foreach ($books as $book){
            $style = '';
            $un = '';
            if(in_array($book["ID"], $bookingList)) {
                $style = 'background-color: cadetblue;';
                $un = 'un';
            }

            echo "<li class='booking_list' style='".$style."'>
                            <span>" .$book['VALUE']. "</span>
                            <button 
                                type='submit' 
                                name='".$un."bookingID'  
                                value='".$book['ID']."'>
                                    ".$un."booking
                            </button>
                        </li>";
        }
    }

    public function insertHistoryBookInfo(){
        $formFields = $this->formFields;
        $historyList = $this->historyList;

        foreach ($formFields as $formFieldName){
            echo "<div>".ucfirst($formFieldName)."</div>";
        }
        foreach ($historyList as $historyElement){
            foreach ($formFields as $formFieldName){
                echo "<span>".$historyElement[$formFieldName]."</span>";
            }
        }
    }

    public function insertHistoryTimeInfo(){
        $timeFields = $this->timeFields;
        $historyList = $this->historyList;

        foreach ($timeFields as $timeFieldName){
            echo "<div>".ucfirst($timeFieldName)."</div>";
        }
        foreach ($historyList as $historyElement){
            foreach ($timeFields as $timeFieldName){
                echo "<span>".$historyElement[$timeFieldName]."</span>";
            }
        }
    }
}

$teamplates = new View();
?>
<head>
    <title>Библиотека</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<div id="search_header">
    <span id="search_title">Search</span>
    <span id="result_title">Result</span>
</div>
    <div id="search">
        <div id="search_field">
            <form action="search.handler.php" method="post">
                <?php if(isset($filter)){$teamplates->insertSearchForm($filter);}?>
                <input type="submit">
            </form>
        </div>
        <div id="search_result">
            <form action="booking.handler.php" method="post">
                <ul>
                <?php if(isset($books)) {$teamplates->insertBookingList($books);}?>
                </ul>
            </form>
        </div>
    </div>

<div id="history_header">History Of Visit</div>
<div id="history_of_visit">
    <div id="book_info">
        <?php $teamplates->insertHistoryBookInfo(); ?>
    </div>
    <div id="time_info">

        <?php $teamplates->insertHistoryTimeInfo(); ?>
    </div>
</div>
