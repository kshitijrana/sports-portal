<?php
session_start();
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 600)) {
    // last request was more than 30 minutes ago
    echo "Session expired.";
	session_unset();
	session_destroy();
	echo "<br><a href='../index.php'>Log in</a>";
	die();
}
$_SESSION['time'] = time(); // update last activity time stamp
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Register</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>

<body>
	<?php echo "<div align= 'center' style='font-style: italic ;color:red';>".(!empty($_GET['err'])?'Please enter valid details':'')."</div>";?>
	<div align = "right"><a href="logout.php"><button id="input-submit">Logout</button></a></div>
	<form class = "cf" method="POST" action="form_test.php">
		<input type="number" name="num_players" placeholder="Number of players (Min : 2)" required autofocus>
		<br><input type="text" name="college" placeholder="College" required>
		<center><input type="submit" id = "input-submit" name="submit"></center>
	
	</form>
	
	<div id="footer">
		<center>© System Admin MIT 2017</center>
	</div> 
</body>
</html>