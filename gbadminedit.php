<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h3>Edit User:</h3>

<form method="POST" action="gbchangedb.php">
<table border="0" width="60%">

	
<tr><td width="30%">Name: </td><td><input type="text" name="newname"></td></tr>

<tr><td width="30%">Email: </td><td><input type="text" name="newemail"></td></tr>

<tr><td width="30%">Phone: </td><td><input type="text" name="newphone"></td></tr>

<tr><td width="30%">Password: </td><td><input type="text" name="newpassword"></td></tr>

</table>

<input type="submit" name="Save & Update">

<input type="hidden" name="id"

</form>

<h3><center>
<?php include("gblinks.php"); ?>
</center></h3>

</body>
</html>  