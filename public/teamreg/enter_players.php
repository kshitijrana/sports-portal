<?php
session_start();
include("../../includes/included_functions_teamreg.php");
//retrieve session variable
$sport_selected = $_SESSION["sport"];
$message = "";
//if submit has been set check whether for the respective team sizes
if(isset($_POST["submit1"]))
{
	if($sport_selected=="basketball" and $_POST["gender"]=="Male"  and $_POST["playernum"] > 5){
		$message = "Team size cannot exceed 5.";
	}
	else if($sport_selected=="basketball" and $_POST["gender"]=="Female" and $_POST["playernum"] > 6){
		$message = "Team size cannot exceed 6.";
	}
	else if($sport_selected=="football" and $_POST["gender"]=="Male" and $_POST["playernum"] > 11){
		$message = "Team size cannot exceed 11.";
	}
	else if($sport_selected=="football" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="cricket" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="cricket" and $_POST["gender"]=="Female"){
		$message = "This sport is not available for the selected gender.";
	}
	else if($sport_selected=="athletics" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="athletics" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="badminton" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="badminton" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="chess" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="chess" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="cross_country" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="cross_country" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="hockey" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="hockey" and $_POST["gender"]=="Female"){
		$message = "This sport is not available for the selected gender.";
	}
	else if($sport_selected=="squash" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="squash" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="swimming" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="swimming" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="table_t" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="table_t" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="lawn_t" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="lawn_t" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="volleyball" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="volleyball" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "This sport is not available for the selected gender.";
	}
	else if($sport_selected=="handball" and $_POST["gender"]=="Male" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="handball" and $_POST["gender"]=="Female"){
		$message = "This sport is not available for the selected gender.";
	}
	else if($sport_selected=="throwball" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else if($sport_selected=="throwball" and $_POST["gender"]=="Male"){
		$message = "This sport is not available for the selected gender.";
	}
	else
	{
		$_SESSION["playernum"] = $_POST["playernum"];
		$_SESSION["gender"] = $_POST["gender"];
		redirect_to("players.php");
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $message;?>
<form method="POST" action="enter_players.php">
	Enter the number of players : 	<input type="text" name="playernum" required>
								  	<br><input type="radio" name="gender" value="Male" required><label for="male">Male</label>
								  	<br><input type="radio" name="gender" value="Female" required><label for="female">Female</label>
								  	<br><input type="submit" name="submit1">
</form>
OR
<a href="search_team_id.php">Enter Team ID</a>
</body>
</html>