
<?php

echo "<h3>Choose an ID to delete:</h3>";

mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

mysql_select_db("gustbook");

$result = mysql_query("SELECT * FROM guestdata WHERE id='".$_REQUEST['id']."'");

echo "<table width=\"90%\" align=center border=2>";
echo "<tr><td width=\"40%\" align=center bgcolor=\"FFFFOO\">ID</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Name</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Email</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Phone</td>
<td width==\"40%\" align=center bgcolor=\"FFFFOO\">Password</td>"
;

while ($row=mysql_fetch_array($result)) {
	
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	$phone=$row['phone'];
	$password=$row['password'];

 echo "<tr><td align=center>$id</td><td>$name</td><td>$email</td><td>$phone</td><td>$password</td></tr>";

}	echo "</table>";

mysql_close();

?>




<form method="POST" action="gbdelete2.php">
<p>Are you sure you want to delete this user?</p>

<input type="submit" name="submit" value="OK">
<input type="hidden" name="id" value="">
	

</form>


<h3><center>
<?php include("gblinks.php"); ?>
</center></h3>