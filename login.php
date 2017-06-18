<?php

$name = $_POST['name'];
$password = $_POST['password'];

if($name && $password){

	mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

	mysql_select_db("gustbook");

	$query = mysql_query("SELECT * FROM guestdata WHERE name='$name'");

	$numrows = mysql_num_fields($query);


	if ($numrows !=0) {
		while ($row = mysql_fetch_assoc($query)) {

			$dbname = $row['name'];
			$dbpassword = $row['password'];
			
		}

		if ($name==$dbname) {
			if ($password==$dbpassword) {
				echo "You are in!";
			}else{

				echo "Your login password is incorrect!";

			}
		}else{

			echo "Your login name is incorrect!";

		}

	}else{
		echo "This login name is not registered!";

	}


}else{

	echo "You have to type a login name and password!";

}


?>