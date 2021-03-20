<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */


require $_SERVER['DOCUMENT_ROOT']. '/handle.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/FieldsName.php';
require $_SERVER['DOCUMENT_ROOT']. '/booking.handler.php';
require $_SERVER['DOCUMENT_ROOT']. '/search.handler.php';

require $_SERVER['DOCUMENT_ROOT']. '/format/View.php';

$teamplates = new View();
?>
<head>
    <title>Библиотека</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="search_header">
    <span id="search_title">Search</span>
    <span id="result_title">Result</span>
</div>
    <div id="search">
        <div id="search_field">
            <form method="post">
                <?php $teamplates->insertSearchForm($_SESSION);?>
                <button type="submit">Submit</button>
                <button name="resetSession">Reset</button>
            </form>
        </div>
        <div id="search_result">
            <form method="post">
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
<?php if (isset($_SESSION['Error message']))
    {$teamplates::errorAlert($_SESSION['Error message']);} ?>
</body>
