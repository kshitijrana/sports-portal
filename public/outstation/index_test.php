<?php
require_once("../../includes/included_functions_delegate.php");
require_once("../../includes/check_functions.php");
$msg="";
if(isset($_POST["submit"]))
{
	session_start();
	if(!is_numeric($_POST["num_players"]) or !check_name($_POST["college"]) or ($_POST["num_players"]<1) )
	{
		redirect_to("main.php?err=1");
	}
	else
	{
		$_SESSION["num_players"] = $_POST["num_players"];
		$_SESSION["college"] = $_POST["college"];
		unset($_SESSION["error_msg"]);
		redirect_to("players.php");
	}
	
}
?>