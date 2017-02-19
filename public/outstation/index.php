<?php
include("../../includes/included_functions_delegate.php");
include("../../includes/check_functions.php");

if(isset($_POST["submit"]))
{
	session_start();
	if(!is_numeric($_POST["num_players"]) or !check_name($_POST["college"]))
	{
		echo "Please enter valid details";
	}
	$_SESSION["num_players"] = $_POST["num_players"];
	$_SESSION["college"] = $_POST["college"];
	redirect_to("players.php");
}
?>
<!DOCTYPE html>
<head>
	<title>Register</title>
</head>
<body>
	<form method="POST" action="index.php">
		<input type="number" name="num_players" placeholder="Number of players" required autofocus>
		<br><input type="text" name="college" placeholder="College" required>
		<input type="submit" name="submit">
	</form>
</body>
</html>