<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Model/History.php';


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

    public function insertBookingList($books)
    {
        $bookingList = $this->bookingList;
        $even = 'even';
        foreach ($books as $book)
        {
            $style = '';
            $un = '';
            if ($even){$even = '';} else {$even = 'even';}
            if (in_array($book["ID"], $bookingList))
            {
                $style = 'background-color: cadetblue;';
                $un = 'un';
            }

            echo "<li class='booking_list ".$even."' style='".$style."'>
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
        $fields = array_merge($this->formFields, $this->timeFields);
        $historyList = $this->historyList;
		$even = 'even';

        foreach ($fields as $formFieldName)
        {
            echo "<div>".ucfirst($formFieldName)."</div>";
        }
        foreach ($historyList as $historyElement)
        {
			if ($even){$even = '';} else {$even = 'even';}
            foreach ($historyElement as $title => $value)
            {
            	echo "<span class='history ".$even."'>".$value."</span>";
            }
        }
    }


    public static function errorAlert($message){
    	echo
		'<script type="text/javascript">'
			.'alert("'.$message.'");'
		.'</script>';
	}
}