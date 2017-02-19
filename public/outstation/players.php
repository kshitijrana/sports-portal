<?php
session_start();
include("../../includes/included_functions_delegate.php");
//get the number of players and college name from the session
$num_of_players=$_SESSION["num_players"];
$college = $_SESSION["college"];
if(isset($_POST["submit"]))
{
	//insert the data into the database
	//insert the vice captain and captian's details first
	$id = add_delegates($_POST["c_name"],$_POST["c_regno"],$_POST["c_phone"],$_POST["c_email"],$college,200);
	echo "Registration number " . $_POST["c_regno"] . " registered successfully with id " . $id;
	$id = add_delegates($_POST["vc_name"],$_POST["vc_regno"],$_POST["vc_phone"],$_POST["vc_email"],$college,200);
	echo "Registration number " . $_POST["c_regno"] . " registered successfully with id " . $id;
	//insert rest all records
	for($i = 0; $i < $num_of_players-2; $i++)
	{
		$id = add_delegates($_POST["name_".($i+1)],$_POST["regno_".($i+1)],$_POST["c_phone"],$_POST["c_email"],$college,200);
		echo "<br>Registration number " . $_POST["regno_".($i+1)] . " registered successfully with id " . $id;
	}
	echo "<a href='index.php'>Enter more</a>";
	die();
}
echo "<!DOCTYPE html>
	<head>
		<title>Register</title>
	</head>
	<body>
	<form method='POST' action='players.php'>";
echo "Captain Details:<br><input name='c_name' placeholder='Name' required autofocus><br><input name='c_regno' placeholder='Registration Number' required><br><input name='c_phone' placeholder='Phone number' required><br><input name='c_email' placeholder='Email' required>";
echo "<br>Vice Captain Details:<br><input name='vc_name' placeholder='Name' required><br><input name='vc_regno' placeholder='Registration Number' required><br><input name='vc_phone' placeholder='Phone number' required><br><input name='vc_email' placeholder='Email' required><br>";
//rest all other players except the captain and vc
echo "Rest all players : <br>";
for($i=0;$i < $num_of_players-2;$i++)
{
	echo "<input name='name_".($i+1)."' placeholder='Name ".($i+1)."' required>  <input name='regno_".($i+1)."' placeholder='Registration Number ".($i+1)."' required><br>";
}
echo "<input type='submit' name='submit'>
	  </form>
	  </body>
	  </html>";
?>