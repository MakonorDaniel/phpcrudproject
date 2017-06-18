<?php


mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

mysql_select_db("gustbook");

$per_page = 6;
// in each pages want  to have 6 pages
$pages_query = mysql_query("SELECT COUNT('id') FROM guestdata");
// THIS VARIABLE COUNTS ALL THE FIELD ID IN THE TABLE
$pages = ceil(mysql_result($pages_query, 0) / $per_page);
//ceil helps converts the result in decimal to the nearest whole number
$page = (isset($GET['page'])) ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $per_page;

$query = mysql_query("SELECT name FROM guestdata LIMIT $start, $per_page");
//LIMIT limits the nuber of users for each page $start from 0, $per_page is 6


while ($query_row = mysql_fetch_assoc($query)) {
	echo $query_row['name'].'<br />';


}

$prev  = $page - 1;
$next = $page  + 1;

if(!($page<=1)){
echo "<a href='pagination.php?page=$prev'>Prev</a> ";
//this puts the previous button and decreases page
}


if ($pages >= 1){

	for ($x=1; $x<=$pages ; $x++) { 
		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ':'<a href="?page='.$x.'">'.$x.'</a> ' ;
//The if statement and for loop puts the number	and set the page below and be in bold or normal when clicked.
	}

}

if(!($page>=$pages)){
echo "<a href='gbpagination.php?page=$next'>Next</a> ";
//this puts the next button and increases page
}

?>
