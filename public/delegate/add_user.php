<?php  
session_start();
require_once("check_functions.php");
include("../../includes/included_functions_delegate.php");
if(!isset($_SESSION["user_id"]))
{
	redirect_to("login.php");
}
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 60)) {
    // last request was more than 10 minutes ago
    echo "Session expired.";
	session_unset();
	session_destroy();
	echo "<br><a href='login.php'>Log in</a>";
	die();
}
$_SESSION['time'] = time(); // update last activity time stamp
$usr = $_SESSION["user_id"];
$aid = $_SESSION["admin_id"];

// if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['secret']))
// {
// 	echo "Some error occured"; 
// 	die();
// }
if(isset($_POST["secret"]))
{
	$nm=$_POST['name'];
	$rg=$_POST['reg'];
	$coll=$_POST['coll'];
	$em=$_POST['email'];
	$gn=$_POST['gender'];
	$ct=$_POST['cont'];
	$flags= array();
	$flags[0]=validate_name($nm);
	$flags[1]=validate_reg($rg);
	$flags[2]=validate_college($coll);
	$flags[3]=validate_email($em);
	$flags[4]=validate_gender($gn);
	$flags[5]=validate_phone($ct);
	$flags[6]=validate_user($usr);
	if(in_array(0, $flags))
	{
		if($flags[0]==0)
			echo "Name is invalid<br><br>";
		if($flags[1]==0)
			echo "Registration number is invalid<br><br>";
		if($flags[2]==0)
			echo "College is invalid<br><br>";
		if($flags[3]==0)
			echo "Email is invalid<br><br>";
		if($flags[4]==0)
			echo "Gender is invalid<br><br>";
		if($flags[5]==0)
			echo "Phone is invalid<br><br>";
		if($flags[6]==0)
			echo "User is invalid<br><br>";
		die();
	}
	$connection=mysqli_connect("localhost","root","","revels17");
	if (mysqli_connect_errno()) {
	    printf("Connection failed: %s\n", mysqli_connect_error());
	    die();
	}
	$nm=mysqli_real_escape_string($connection,$nm);
	$rg=mysqli_real_escape_string($connection,$rg);
	$coll=mysqli_real_escape_string($connection,$coll);
	$em=mysqli_real_escape_string($connection,$em);
	$gn=mysqli_real_escape_string($connection,$gn);
	$ct=mysqli_real_escape_string($connection,$ct);
	$usr=mysqli_real_escape_string($connection,$usr);
	$aid=mysqli_real_escape_string($connection,$aid);
	$query ="INSERT INTO
			 participant(Name,REGNO,Clg_name,Email,Phone,Gender,user_id,admin_id) VALUES
			 (?, ?, ?, ?, ?, ?,?,?);";

	$stmt = mysqli_prepare($connection,$query);
	mysqli_stmt_bind_param($stmt, 'ssssssss', $nm, $rg, $coll, $em, $ct, $gn,$usr,$aid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
	$id=mysqli_insert_id($connection);
	echo "<h2>User successfully registered with id ".$id."</h2>";
	mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet"
		      type="text/css"
              href="style.css">
		<title>Add User</title>
	</head>

<body>
<center>
	<form action="add_user.php" style=" font-size: 25px; font-family: sans-serif; " method="POST">
		Name:<br>
		<input type="text" style=" height: 25px;" pattern="[a-zA-z'. ]*" name="name" required> <br><br>
		Reg No. :<br>
		<input type="text" style=" height: 25px;" pattern="[0-9a-zA-Z ]*" name="reg" required><br><br>
		
		College : <br>
		<input type="text" style=" height: 25px;" pattern="[a-zA-z'. ]*" name="coll" required><br><br>
		
		Email : <br>
		<input type="email" style=" height: 25px;"  name="email" required><br><br>
		
		Contact No. : (Numeric Only)<br>
		<input type="text" style=" height: 25px;"	pattern="[+]{0,1}[0-9]{10,15}" 
		name="cont" required><br><br>
		Gender :<br>
		<input type="radio" style=" height: 25px;" value ="male" name="gender"  required>Male<br>
		<input type="radio" style=" height: 25px;" value ="female" name="gender"  required>Female<br>
		<button class="button" style="padding: 10px 15px;" type ="submit" name = "secret" >Submit</button>
		<input class="button" style="padding: 10px 15px;" type="reset">
	</form>
</center>

</body>
</html>
<header></header>