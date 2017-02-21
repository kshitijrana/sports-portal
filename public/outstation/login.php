<?php
include("../../includes/included_functions_delegate.php");
$message="";
if(isset($_SESSION["user_id"]))
{
	redirect_to("main.php");
}

if(isset($_POST["submit"]))
{
	$check = match_user_admin($_POST["user_username"],$_POST["user_password"],$_POST["admin_username"],$_POST["admin_password"]);
	if($check == -99)
		$message = "Try again";
	else if($check != 0)
	{
		session_start();
		$_SESSION["user_id"] = $check[0];
		$_SESSION["admin_id"] = $check[1];
		redirect_to("main.php");
	}
	else
		$message="Incorrect username or password";
}	
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="form_1">
<form method="POST" action="login.php">
<br>User details :<br>
<input type="text" name="user_username" placeholder="Username" required><br>
<input type="password" name="user_password" placeholder="Password" required><br>
Admin details :<br>
<input type="text" name="admin_username" placeholder="Username" required><br>
<input type="password" name="admin_password" placeholder="Password" required><br>
<input type="submit" name="submit" id="input-submit">
</form>
<?php
echo $message;
?>
</div>
</body>
</html>