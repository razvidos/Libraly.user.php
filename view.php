<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */
$formFields = array('author', 'name', 'tag', 'yearPublished');
$timeFields = array('date from', 'date to');

//echo "<br>booking books = ";
//print_r($books["booking"]);
?>
<head>
    <title>Библиотека</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<div id="search_header">
    <span id="search_title">Search</span>
    <span id="result_title">Result</span>
</div>
<form action="handle.php">
    <div id="search">
        <div id="search_field">
            <?php foreach ($formFields as $formField){
                echo "<lable>".ucfirst($formField)."</lable><br>
                    <input type='text' name='".$formField."' value='".$filter[$formField]."'><br><br>";
            }?>
            <input type="submit">
        </div>

        <div id="search_result">
            <input style="display: none" name="bookingBooks" value="<?php echo implode(',', $books["booking"]);?>">
            <ul>
            <?php
            foreach ($books["all"] as $book){
                $style = '';
                $un = '';
                if(in_array($book["ID"], $books["booking"])) {
                    $style = 'background-color: cadetblue;';
                    $un = 'un';
                }

                echo "<li class='booking_list' style='".$style."'>
                    <span>" .$book['VALUE']. "</span>
                    <button 
                        type='submit' 
                        name='".$un."bookID'  
                        value='".$book['ID']."'>
                            ".$un."booking
                    </button>
                </li>";
            }
            ?>
            </ul>
    </div>
    </div>
</form>
<div id="history_header">History Of Visit</div>
<div id="history_of_visit">
    <div id="book_info">
        <?php foreach ($formFields as $formField){
            echo "<div>".ucfirst($formField)."</div>";
        }?>
    </div>
    <div id="time_info">
        <?php foreach ($timeFields as $timeField){
            echo "<div>".ucfirst($timeField)."</div>";
        }?>
    </div>
</div>
