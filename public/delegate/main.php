<?php
//main page to display
//using iframe to display the input the values and confirmation page
session_start();
?>
<!DOCTYPE html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../../stylesheets/main_style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,600,600i" rel="stylesheet"> -->
	<meta http-equiv="refresh" content="10000;url=index.php">
	<title>Main page</title>
</head>
<body>
<!-- 	<div id="wrapper">
		<header id="header">
			<a href="main.php" class="logo"><strong>System Admin</strong><span>MIT</span></a>
		</header> -->
		<iframe src="details.php" style="border:none; width:100%; height:600px;"></iframe>
	<!-- </div> -->
</body>
</html>