<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */


require $_SERVER['DOCUMENT_ROOT'] . '/handler.php';
require $_SERVER['DOCUMENT_ROOT']. '/data/FieldsName.php';
require $_SERVER['DOCUMENT_ROOT']. '/booking.handler.php';
require $_SERVER['DOCUMENT_ROOT']. '/search.handler.php';

require $_SERVER['DOCUMENT_ROOT'] . '/format/Template.php';

$templates = new Template();
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
                <?php $templates->insertSearchForm($_SESSION);?>
                <button type="submit">Submit</button>
                <button name="resetSession">Reset</button>
            </form>
        </div>
        <div id="search_result">
            <form method="post">
                <ul>
                <?php if(isset($books)) {$templates->insertBookingList($books);}?>
                </ul>
            </form>
        </div>
    </div>

<div id="history_header">History Of Visit</div>
<div id="history_of_visit">
    <div id="book_info">
        <?php $templates->insertHistoryBookInfo(); ?>
    </div>
    <div id="time_info">

        <?php $templates->insertHistoryTimeInfo(); ?>
    </div>
</div>
<?php if (isset($_SESSION['Error message'])) {
    $templates::errorAlert($_SESSION['Error message']);
	$_SESSION['Error message'] = null;
} ?>
</body>
