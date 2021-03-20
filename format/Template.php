<?php

require $_SERVER['DOCUMENT_ROOT']. '/lib/History.php';


class Template
{
    private array $formFields;
    private array $timeFields;
    private array $bookingList;
    private array $historyList;

    public function __construct()
    {
		$this->formFields = $GLOBALS['FIELD_NAME']['SEARCH'];
		$this->timeFields = $GLOBALS['FIELD_NAME']['TIME'];
		$this->bookingList = Booking::getList();
		$this->historyList = History::getList();
    }

    public function insertSearchForm($filters)  // from search.handle
    {
        $formFields = $this->formFields;
        foreach ($formFields as $formFieldName)
        {
        	if(!isset($filters[$formFieldName]))
        		{$filters[$formFieldName] = '';}
            echo "
                <lable>".ucfirst($formFieldName)."</lable>
                <br>
                <input 
                    type='text' 
                    name='".$formFieldName."' 
                    value='".$filters[$formFieldName]."'>
                <br><br>";
        }
    }

    public function insertBookingList($books)  // from search.handle
    {
        $bookingList = $this->bookingList;
        foreach ($books as $book)
        {
            $style = '';
            $un = '';
            if(in_array($book["ID"], $bookingList))
            {
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

    public function insertHistoryBookInfo()
    {
        $formFields = $this->formFields;
        $historyList = $this->historyList;

        foreach ($formFields as $formFieldName)
        {
            echo "<div>".ucfirst($formFieldName)."</div>";
        }
        foreach ($historyList as $historyElement)
        {
            foreach ($formFields as $formFieldName)
            {
                echo "<span>".$historyElement[$formFieldName]."</span>";
            }
        }
    }

    public function insertHistoryTimeInfo()
    {
        $timeFields = $this->timeFields;
        $historyList = $this->historyList;

        foreach ($timeFields as $timeFieldName){
            echo "<div>".ucfirst($timeFieldName)."</div>";
        }
        foreach ($historyList as $historyElement)
        {
            foreach ($timeFields as $timeFieldName)
            {
                echo "<span>".$historyElement[$timeFieldName]."</span>";
            }
        }
    }

    public static function errorAlert($message){
    	echo
		'<script>'
			.'alert("'.$message.'");'
		.'</script>';
	}
}