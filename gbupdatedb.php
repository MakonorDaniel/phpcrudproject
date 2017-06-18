<?php

echo "<h3>Choose an ID to edit:</h3>";

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
$query = mysql_query("SELECT * FROM guestdata LIMIT $start, $per_page");
//page starts from zero and the limit is 6 users per page



//$result = mysql_query("SELECT * FROM guestdata");

echo "<table width=\"90%\" align=center border=2>";
echo "<tr><td width=\"40%\" align=center bgcolor=\"FFFFOO\">ID</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Name</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Email</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Phone</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Password</td>"
;

while ($row=mysql_fetch_assoc($query)) {
// we changed the fetch array to fetch assoc because it is an assoicative array (makes it an associative array) and change $result to $query.
	
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	$phone=$row['phone'];
	$password=$row['password'];

 echo "<tr><td align=center>
	<a href=\"gbadminedit.php?id=$id&name=$name&email=$email&phone=$phone&password=$password\">$id</a></td><td>$name</td><td>$email</td><td>$phone</td><td>$password</td></tr>"; 

}	echo "</table>";

$prev = $page - 1;
$next = $page + 1;


echo "<center>";

if (!($page<=1)) {
	echo "<a href='gbupdatedb.php?page=$prev'>Prev</a> ";
//previous button or link works with this
}



if ($pages >= 1){

	for ($x=1;$x<=$pages;$x++) {

		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
//This echo sets the paginated numbers clicked in bold and the rest normal
	}

}

if (!($page>=$pages)) {
	echo "<a href='gbupdatedb.php?page=$next'>Next</a> ";
//Next button or link works with this. Note the if statements, $pages is the last number
}

echo "</center>";


mysql_close();

?>


<h3><center>
<?php include("gblinks.php"); ?>
</center></h3>
