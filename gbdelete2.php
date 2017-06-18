<?php 

mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

mysql_select_db("gustbook");

$result = mysql_query("DELETE FROM guestdata WHERE id='".$_REQUEST['id']."' ");


echo "The user has been deleted successfully!";

mysql_close();

?>

<h3><center>
<?php include("gblinks.php"); ?>
</center></h3>