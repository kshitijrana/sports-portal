<?php
include("../../includes/check_functions.php");
include("../../includes/included_functions_delegate.php");
session_start();
//check if submit has been pressed
$message="";
if(isset($_POST["submit"]))
{
	$name_flag = 0;
	if(check_name($_POST["name"]))
		$name_flag = 1;
	else
		$message .= "Name is incorrect";
	$college_flag = 0;
	if(check_name($_POST["college"]))
		$college_flag = 1;
	else
		$message .= "<br>College name is incorrect";
	$email_flag = 0;
	if(check_email($_POST["email"]))
		$email_flag = 1;
	else
		$message .= "<br>Email is incorrect";
	$num_flag = 0;
	if(check_number($_POST["phone"]))
		$num_flag = 1;
	else
		$message .= "<br>Phone number is incorrect";
	//if info is correct send to the confirmation page
	if($name_flag and $college_flag and $email_flag and $num_flag)
	{
		//create an associative array of the post variables
		$info = array('name' => $_POST["name"],'regno'=>$_POST["regno"],'college'=>$_POST["college"],'email'=>$_POST["email"],'phone'=>$_POST["phone"],
			'gender'=>$_POST["gender"]);
		//encode the array into json
		$encoded_info = json_encode($info);
		$_SESSION["participant_details"] = $encoded_info;
		redirect_to("confirm_details.php");
	}
}
?>
<!DOCTYPE html>
<head>title>Participant Details</title>
</head>
<body>
<div id="details">
<form method="POST" action="details.php">
	<div class="row uniform">
					<?php echo $message."<br>";?>
	Enter details : <br><input type="text" name="name" placeholder="Name" required autofocus></div>
					<br><br><input type="text" name="regno" placeholder="Registration Number" required></div>
					<br><br><input type="text" name="college" placeholder="College" required></div>
					<br><br><input type="text" name="email" placeholder="Email" required></div>
					<br><br><input type="text" name="phone" placeholder="Phone Number" required></div>
					<br><br><input type="radio" name="gender" value="Male" required><label for="male">Male</label></div>
					<br><br>><input type="radio" name="gender" value="Female" required><label for="female">Female</label></div>
					<br><input type="submit" name="submit"></div>

	</div>
</form>
</div>
</body>
</html>