<?php 


$newname=$_REQUEST['newname'];
$newemail=$_REQUEST['newemail'];
$newphone=$_REQUEST['newphone'];
$newpassword=$_REQUEST['newpassword'];

mysql_connect("localhost", "root", "", "gustbook") or die("Problems with connection!");

mysql_select_db("gustbook"); 

mysql_query("UPDATE guestdata SET name='$newname' email='$newemail' phone='$newphone' password='$newpassword'  ");

echo "Your values have been updated successfully!";

mysql_close();


include("gblinks.php");


?>