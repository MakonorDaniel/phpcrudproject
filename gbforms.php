<!DOCTYPE html>
<html>
<head>
	<title>GustBook Forms</title>
</head>
<body>

<h2>Sign In Form</h2>

<form enctype="multipart/form-data" method="post" action="gbinsertdb.php">

Name: <input type="text" name="name" maxlength="30"><br><br>
Email: <input type="text" name="email" maxlength="30"><br><br>
Phone: <input type="tel" name="phone" maxlength="30"><br><br>
Password: <input type="password" name="password" maxlength="10"><br><br>
Confirm Password: <input type="password" name="cpassword" maxlength="10"><br><br>
<input type="hidden" name="MAX_FILE_SIZE" value="10000"><br><br>
Upload your profle picture:<input type="file" name="upload"><br><br>


<input type="submit" name="submit" value="Register">

</form><br><br>



<a href="gboutputdb.php">See Data</a>



<?php include("gblinks.php"); ?>














</body>
</html>