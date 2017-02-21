<?php
session_start();
require_once("../../includes/included_functions_delegate.php");
require_once("../../includes/check_functions.php");
//get the number of players and college name from the session
$num_of_players=$_SESSION["num_players"];
$college = $_SESSION["college"];
$msg="";
if(isset($_POST["submit"]))
{
	//check whether the entered data is correct or not
	$c_name_flag = check_name($_POST["c_name"]);
	//$c_regno_flag = ctype_alnum($_POST["c_regno"]);
	$c_phone_flag = validate_phone($_POST["c_phone"]);
	$c_email_flag = check_email($_POST["c_email"]);
	if(!($c_name_flag and $c_phone_flag and $c_email_flag))
	{
		$msg = "Player 1's details are wrong.<br>";
	}
	if($num_of_players>1)
	{
		$vc_name_flag = check_name($_POST["vc_name"]);
		//$vc_regno_flag = ctype_alnum($_POST["vc_regno"]);
		$vc_phone_flag = validate_phone($_POST["vc_phone"]);
		$vc_email_flag = check_email($_POST["vc_email"]);
		if(!($vc_name_flag and $vc_phone_flag and $vc_email_flag))
		{
			$msg .= "Player 2's details are wrong.<br>";
		}
	}
	for($i = 2; $i < $num_of_players;$i++)
	{
		$name_flag = check_name($_POST["name_".($i+1)]);
		//$regno_flag = ctype_alnum($_POST["regno_".($i+1)]);
		if(!$name_flag )
		{
			$msg .= " Player " . ($i+1) . " details are wrong.<br>";
		}
	}
	if($msg=="")
	{
		//insert the data into the database
		//insert the vice captain and captian's details first
		$confirm="";
		$arr = make_prpstmt_object();
		$id = add_delegates($_POST["c_name"],$_POST["c_regno"],$_POST["c_phone"],$_POST["c_email"],$college,200,$_SESSION["admin_id"],$arr[0],$arr[1]);
		$confirm.= "<div class = 'result' >1 : Registration number " . $_POST["c_regno"] . " registered with id " . $id . "</div>";
		if($num_of_players > 1)
		{
		$id = add_delegates($_POST["vc_name"],$_POST["vc_regno"],$_POST["vc_phone"],$_POST["vc_email"],$college,200,$_SESSION["admin_id"],$arr[0],$arr[1]);
		$confirm.="<br><div class = 'result' >2: Registration number " . $_POST["vc_regno"] . " registered with id " . $id. "</div>";
		}
		//insert rest all records
		for($i = 2; $i < $num_of_players; $i++)
		{
			$id = add_delegates($_POST["name_".($i+1)],$_POST["regno_".($i+1)],$_POST["c_phone"],$_POST["c_email"],$college,200,$_SESSION["admin_id"],$arr[0],$arr[1]);
			$confirm.="<br><div class = 'result' >".($i+1)."Registration number " . $_POST["regno_".($i+1)] . " registered with id " . $id. "</div>";
		}
		$confirm.="<br><br><center>Click <a href='main.php'>here</a> to enter more teams.<center>";
		$_SESSION["confirm"]=$confirm;
		redirect_to("confirmation.php");
	}
	else
	{
		$_SESSION['error_msg']=$msg;
		redirect_to("players.php");
	}
	
}
?>