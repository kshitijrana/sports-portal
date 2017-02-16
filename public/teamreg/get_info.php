<?php
session_start();
$msg="";
include("../../includes/included_functions_teamreg.php");
if(!isset($_SESSION["user_id"]))
{
	echo $_SESSION["user_id"];
	redirect_to("login.php");
}
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 600)) {
    // last request was more than 30 minutes ago
    echo "Session expired.";
	session_unset();
	session_destroy();
	echo "<br><a href='login.php'>Log in</a>";
	die();
}
$_SESSION['time'] = time(); // update last activity time stamp

if(isset($_POST["submit"]))
{
	if($_POST["sport"] == "SELECT")
	{
		$msg = "Please select an option";
	}
	else
	{
		$_SESSION["sport"] = $_POST["sport"];
		redirect_to("enter_players.php");
	}
}

?>
<html>
<head>
	<title></title>
</head>
<body>
<div>
<form action="get_info.php" method="POST">
	<?php echo $msg;?>
	<br>
	<select name="sport" required>
		<option selected>SELECT</option>
		<option value="basketball">Basketball</option>
		<option value="football">Football</option>
		<option value="hockey">Hockey</option>
		<option value="badminton">Badminton</option>
		<option value="squash">Squash</option>
		<option value="handball">Handball</option>
		<option value="throwball">Throwball</option>
		<option value="athletics">Athletics</option>
		<option value="cross_country">Cross country</option>
		<option value="volleyball">Volleyball</option>
		<option value="swimming">Swimming</option>
		<option value="table_t">Table tennis</option>
		<option value="lawn_t">Lawn tennis</option>
		<option value="chess">Chess</option>
		<option value="cricket">Cricket</option>
	</select>
	<br><input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>