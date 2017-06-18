<?php 

mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

mysql_select_db("gustbook");

$result = mysql_query("SELECT * FROM guestdata");

while ($row = mysql_fetch_array($result)) {
	
	echo $row['name']." ".$row['email']." ".$row['phone']." ".$row['password'];

	echo "<br />";
}

mysql_close();


?>

<h3><center>
<?php include("gblinks.php"); ?>
</center></h3>