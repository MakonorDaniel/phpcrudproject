<?php


mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

mysql_select_db("gustbook");

$per_page = 6;
// in each pages want  to have 6 pages
$pages_query = mysql_query("SELECT COUNT('id') FROM guestdata");
// THIS VARIABLE COUNTS ALL THE FIELD ID IN THE TABLE
$pages = ceil(mysql_result($pages_query, 0) / $per_page);
//ceil helps converts the result in decimal to the nearest whole number
//ceil conversts 1.3 to 2 and floor converts 1.3 to 1 
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
//
$start = ($page - 1) * $per_page;
//variable to start page from zero
$query = mysql_query("SELECT name FROM guestdata LIMIT $start, $per_page");
//page starts from zero and the limit is 6 users per page




while ($query_row = mysql_fetch_assoc($query)) {
	echo $query_row['name'].'<br />';
}

$prev = $page - 1;
$next = $page + 1;

if (!($page<=1)) {
	echo "<a href='pagination.php?page=$prev'>Prev</a> ";
//previous button or link works with this
}



if ($pages >= 1){

	for ($x=1;$x<=$pages;$x++) {

		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
//This echo sets the paginated numbers clicked in bold and the rest normal
	}

}

if (!($page>=$pages)) {
	echo "<a href='pagination.php?page=$next'>Next</a> ";
//Next button or link works with this. Note the if statements, $pages is the last number
}

?>
