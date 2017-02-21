
<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"UTF-8\">
		<link rel='stylesheet' type='text/css' href='../stylesheets/style.css'>
		<title>Register</title>
	</head>
	<body>
		<h2 id="heading_1">Enter team details :</h1>
		<div align = 'center' style='font-style: italic ;color:red;'>
		<?php 
		session_start();
		echo (!empty($_SESSION['error_msg'])?$_SESSION['error_msg']:''); 
		?></div>
		<form class = 'cf' method='POST' action='players_test.php'>
			<?php	
				
				for($i=0;$i < $_SESSION["num_players"];$i++)
				{
					if($i==0)
					{
						echo "<h2>Player 1 :</h2><br><input name='c_name' placeholder='Name' required autofocus><input name='c_regno' placeholder='Registration Number' required><input name='c_phone' placeholder='Phone number' required><input name='c_email' placeholder='Email' required>";
					}
					else if($i==1)
					{
						echo "<br><h2>Player 2 :</h2><br><input name='vc_name' placeholder='Name' required><input name='vc_regno' placeholder='Registration Number' required><input name='vc_phone' placeholder='Phone number' required><input name='vc_email' placeholder='Email' required><br>";
					}
					else
						echo "<br><h2>Player ".($i+1)." : </h2><br><input name='name_".($i+1)."' placeholder='Name ".($i+1)."' required>  <input name='regno_".($i+1)."' placeholder='Registration Number ".($i+1)."' required><br>";
				}
			?> 
			<center>
				<input id = 'input-submit' type='submit' name='submit'>
			</center>
			<br><br>
			<div id='footer'>
			<center>© System Admin MIT 2017</center>
			</div>
	 	</form>
	</body>
</html>