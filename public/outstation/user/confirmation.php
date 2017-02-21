<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Confirmation</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>

<body>
	<h1 id="heading_1">Registered players :</h1>
	<?php
	session_start();
	if(!empty($_SESSION["confirm"]))
		echo $_SESSION["confirm"];

	?>
	<br><br><div id="footer" >
		<center>© System Admin MIT 2017</center>
	</div> 
</body>
</html>