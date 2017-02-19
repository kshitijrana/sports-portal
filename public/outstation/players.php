<?php
session_start();
include("../../includes/included_functions_delegate.php");
include("../../includes/check_functions.php");
//get the number of players and college name from the session
$num_of_players=$_SESSION["num_players"];
$college = $_SESSION["college"];
$msg="";
echo "<!DOCTYPE html>
	<head>
		<link rel='stylesheet' type='text/css' href='style.css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<title>Register</title>
	</head>
	<body>";
if(isset($_POST["submit"]))
{
	//check whether the entered data is correct or not
	$c_name_flag = check_name($_POST["c_name"]);
	$c_regno_flag = ctype_alnum($_POST["c_regno"]);
	$c_phone_flag = validate_phone($_POST["c_phone"]);
	$c_email_flag = check_email($_POST["c_email"]);
	if(!($c_name_flag and $c_regno_flag and $c_phone_flag and $c_email_flag))
	{
		$msg = "Captain's details are wrong.";
	}
	$vc_name_flag = check_name($_POST["vc_name"]);
	$vc_regno_flag = ctype_alnum($_POST["vc_regno"]);
	$vc_phone_flag = validate_phone($_POST["vc_phone"]);
	$vc_email_flag = check_email($_POST["vc_email"]);
	if(!($vc_name_flag and $vc_regno_flag and $vc_phone_flag and $vc_email_flag))
	{
		$msg .= " Vice captain's details are wrong.";
	}
	for($i = 0; $i < $num_of_players-2;$i++)
	{
		$name_flag = check_name($_POST["name_".($i+1)]);
		$regno_flag = ctype_alnum($_POST["regno_".($i+1)]);
		if(!($name_flag and $regno_flag))
		{
			$msg .= " Player " . ($i+1) . " details are wrong.";
			break;
		}
	}
	if($msg=="")
	{
		//insert the data into the database
		//insert the vice captain and captian's details first
		$arr = make_prpstmt_object();
		$id = add_delegates($_POST["c_name"],$_POST["c_regno"],$_POST["c_phone"],$_POST["c_email"],$college,200,$arr[0],$arr[1]);
		echo "Registration number " . $_POST["c_regno"] . " registered successfully with id " . $id;
		$id = add_delegates($_POST["vc_name"],$_POST["vc_regno"],$_POST["vc_phone"],$_POST["vc_email"],$college,200,$arr[0],$arr[1]);
		echo "<br>Registration number " . $_POST["c_regno"] . " registered successfully with id " . $id;
		//insert rest all records
		for($i = 0; $i < $num_of_players-2; $i++)
		{
			$id = add_delegates($_POST["name_".($i+1)],$_POST["regno_".($i+1)],$_POST["c_phone"],$_POST["c_email"],$college,200,$arr[0],$arr[1]);
			echo "<br>Registration number " . $_POST["regno_".($i+1)] . " registered successfully with id " . $id;
		}
		echo "<br><a href='index.php'>Enter more</a>";
		die();	
	}
	
}
echo "{$msg}
	<form method='POST' action='players.php'>";
echo "Captain Details:<br><input name='c_name' placeholder='Name' required autofocus><br><input name='c_regno' placeholder='Registration Number' required><br><input name='c_phone' placeholder='Phone number' required><br><input name='c_email' placeholder='Email' required>";
echo "<br>Vice Captain Details:<br><input name='vc_name' placeholder='Name' required><br><input name='vc_regno' placeholder='Registration Number' required><br><input name='vc_phone' placeholder='Phone number' required><br><input name='vc_email' placeholder='Email' required><br>";
//rest all other players except the captain and vc
echo "Rest all players : <br>";
for($i=0;$i < $num_of_players-2;$i++)
{
	echo "<input name='name_".($i+1)."' placeholder='Name ".($i+1)."' required>  <input name='regno_".($i+1)."' placeholder='Registration Number ".($i+1)."' required><br>";
}
echo "<center><input type='submit' name='submit'></center>
	  </form>
	  </body>
	  </html>";
?>