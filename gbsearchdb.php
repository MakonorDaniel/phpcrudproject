<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
<form method="GET" action="gbsearchdb.php">

	<input type="text" name="search">
	<input type="submit" name="submit" value="search database">

</form>
</center>
<hr>
<u>Results:</u>


<?php

if (isset ($_REQUEST['submit'])) {
//isset means the button was clicked
	$search = $_GET['search'];
//
	$terms = explode(" ", $search);
//$terms make an array with eveery word
	$query = "SELECT * FROM guestdata WHERE ";
//

	$i=0;
	foreach ($terms as $each) {

		$i++;

		if ($i==1){
//if there's a word in the array, the value query will concatinate
			$query .= "name LIKE '%$each%' ";

		}else{

			$query .= "OR name LIKE '%$each%' ";
		}

//
	}

	mysql_connect("localhost", "root", "", "gustbook");

	mysql_select_db("gustbook");

	$query = mysql_query($query);
	$num = mysql_num_rows($query);

	if($num > 0 && $search!=""){

		echo "$num result(s) found for <b>$each</b>!";

		while ($row = mysql_fetch_assoc($query)) {
			
			$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$password = $row['password'];

			echo "<br /><h3>name: $name(id: $id)</h3>email: $email<br /></h3>phone: $phone<br />password: $password<br />";

		}

	} else {

			echo "No result found";

	}

	mysql_close();


}else {

	echo "Please search for anything!";
}


?>












</body>
</html>