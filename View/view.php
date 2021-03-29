<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 3:00 PM
 */

require $_SERVER['DOCUMENT_ROOT'] . '/data/language/'.$_SESSION['language'].'/view.php';
require $_SERVER['DOCUMENT_ROOT'] . '/data/FieldsName.php';

require $_SERVER['DOCUMENT_ROOT'] . '/Controller/handler.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controller/booking.handler.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controller/search.handler.php';

require 'Template.php';

global $DOCUMENT;
$templates = new Template();
?>
<head>
    <title>Библиотека</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div><?php echo $DOCUMENT['langSelector'];?>
	<br>
	<a href="../uah">UA</a>
	<a href="../eng">EN</a>
</div>
<div id="search_header">
	<span id="search_title"><?php echo $DOCUMENT['search'];?></span>
	<span id="result_title"><?php echo $DOCUMENT['result'];?></span>
</div>
<div id="search">
	<div id="search_field">
		<form method="post">
			<?php $templates->insertSearchForm($_SESSION);?>
			<button type="submit"><?php echo $DOCUMENT['submit'];?></button>
			<button name="resetSession"><?php echo $DOCUMENT['reset'];?></button>
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

<div id="history_header"><?php echo $DOCUMENT['history'];?></div>
<div id="history_of_visit">
    <div id="book_info">
        <?php $templates->insertHistoryBookInfo(); ?>
    </div>
</div>
<?php if (isset($_SESSION['Error message'])) {
    $templates::errorAlert($_SESSION['Error message']);
	$_SESSION['Error message'] = null;
} ?>
</body>
