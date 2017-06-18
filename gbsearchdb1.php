<!DOCTYPE html>
<html>
<head>
	<title>Search Database</title>
</head>
<body>

<center>
<form method="GET" action="gbsearchdb1.php">
	<input type="text" name="search">
	<input type="submit" name="submit" value="search database">

</form>
</center>
<hr>


<?php

if(isset($_REQUEST['submit'])) {

	$search = $_GET['search'];
	$terms = explode(" ", $search);
	$query = "SELECT * FROM guestdata WHERE ";


	$i=0;
	foreach ($$terms as $each) {
		
		$1++;
		if($i==1){
			$query .= "name LIKE '%$each%' ";

		}else{
			$query .= "OR name LIKE '%$each%' ";
		}


	}

	mysql_connect("localhost", "root", "", "gustbook");

	mysql_select_db("gustbook");

	




















} else {

	echo "Please Search For Anything";
}



?>



</body>
</html>