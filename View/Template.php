<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Model/History.php';
require $_SERVER['DOCUMENT_ROOT'] . '/data/language/'.$_SESSION['language'].'/FieldsName.php';
require $_SERVER['DOCUMENT_ROOT'] . '/data/language/'.$_SESSION['language'].'/ExceptionText.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/language/'.$_SESSION['language'].'/ExceptionText.php';

/*!
 * Dynamic auto generation for html elements.
 *
*/
class Template
{
    private array $formFields;
    private array $timeFields;
    private array $bookingList;
    private array $historyList;

	/**
	 * Template constructor.
	 * Initialize Booking list, History list and fields title&
	 */
	public function __construct()
    {
		$this->formFields = $GLOBALS['FIELD_NAMEs']['SEARCH'];
		$this->timeFields = $GLOBALS['FIELD_NAMEs']['TIME'];
		$this->bookingList = Booking::getList();
		$this->historyList = History::getList();
    }

	/**
	 * @param $filters
	 *
	 * Search form will be filling search value from this session, if is it.
	 */
	public function insertSearchForm($filters)
    {
        $formFields = $this->formFields;
        foreach ($formFields as $formFieldName => $formFieldTitle)
        {
        	if(!isset($filters[$formFieldName]))
        		{$filters[$formFieldName] = '';}
            echo "
                <lable>".$formFieldTitle."</lable>
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
			.'alert("'.$GLOBALS['EXCEPT_MESS'][$message].'");'
		.'</script>';
	}
}