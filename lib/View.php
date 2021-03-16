<?php


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