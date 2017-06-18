<?php 
$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$type = 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];


if ($name && $email && $phone && $password && $cpassword){

//	if (preg_match("/^[_\.0-9a-zA-Z-] +0 ([0-9a-zA-Z] [0-9a-zA-Z-]+\.)+[a-zA-Z] (2,6)$/i", $email)) {
//this if statement checks if the email is a valid one
		
		if(strlen($password)>3){

			if ($password == $cpassword){

				mysql_connect("localhost", "root", "", "gustbook") or die("We couldn't connect!");

				mysql_select_db("gustbook");

				$username = mysql_query("SELECT name FROM guestdata WHERE name='$name'"); //check for already registered username
				$count = mysql_num_rows($username); 

				$remail = mysql_query("SELECT name FROM guestdata WHERE email='$email'"); //check for already registered email
				$checkmail = mysql_num_rows($remail);

					
				if ($checkmail!=0){

					echo "This email is already registered! Please type another mail.";
				}else {
					
				

				if ($count!=0){

					echo "This name is already registered! Please enter a new name";

					/*
					include("gblinks.php");

					die("<h2> ERROR: Name already exist! Please type another name </h2>");
					*/

				}else{

					$passwordmd5 = md5($password);

				mysql_query("INSERT INTO guestdata(name, email, phone, password) VALUES('$name', '$email', '$phone', '$passwordmd5')");

				echo "You have successfully registered";

					}

				}

			}else{

				echo "<h3>Error: Password Mismatch! Please make sure passwords match</h3> ";
			}

		}else {

			echo "You password is too short! you need to type a password between 4 and 10 character";
		}

//}else{
//	echo "Please type a valid email!";
//}		


	}else{

		echo "Please comeplete the form";


	}

	//mysql_close(); // this closes the mysql connection with the database


	include("gblinks.php");


?>