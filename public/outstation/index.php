<?php
include("../../includes/included_functions_delegate.php");
include("../../includes/check_functions.php");
$msg="";
if(isset($_POST["submit"]))
{
	session_start();
	if(!is_numeric($_POST["num_players"]) or !check_name($_POST["college"]))
	{
		$msg= "Please enter valid details";
	}
	else
	{
		$_SESSION["num_players"] = $_POST["num_players"];
		$_SESSION["college"] = $_POST["college"];
		redirect_to("players.php");
	}
	
}
?>
<!DOCTYPE html>
<head>
	<title>Register</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<body>
	<h1 id="heading_1"><u>Outstation Registrations.</u></h1>
	<?php echo $msg;?>
	<form method="POST" action="index.php">
		<input type="number" name="num_players" placeholder="Number of players" required autofocus>
		<br><input type="text" name="college" placeholder="College" required>
		<center><input type="submit" name="submit"></center>
	</form>
	<div id="footer">
		<center>© System Admin MIT 2017</center>
	</div> 
</body>
</html>