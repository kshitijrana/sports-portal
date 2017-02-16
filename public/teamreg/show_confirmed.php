<?php
session_start();
include("../../includes/included_functions_teamreg.php");
//get delegate numbers,gender,sport from session
$ret_info = $_SESSION["d_numbers"];
$gender = $_SESSION["gender"];
$sport = $_SESSION["sport"];
$total_price = 0;
//check if anyone is registering for the same sport again
// uninitialized array of duplicate delegate ids
$dup_d_ids_sport = array();
foreach ($ret_info as $delegate_number)
{
	$val = check_existence($delegate_number,$sport);
	if($val <0)
	{
		//function returned value smaller than 0, query failed
		echo "Query failed.";
		die();
	}
	else if(isset($_SESSION["excep_id"]))
	{
		//the same delegate id is trying to register again for the same sport
		array_push($dup_d_ids_sport, $_SESSION["excep_id"]);
	}
}
if(!empty($dup_d_ids_sport))
{
	foreach ($dup_d_ids_sport as $key) 
	{
		echo "Delegate ID " . $key . " cannot register for " . $sport . " again.";
	}
	echo "<a href='get_info.php'>Go back</a>";
	die();
}
foreach ($ret_info as $num) {
	retrieve_info($num);
	if($sport == "basketball" and $gender == "Male")
	{
		echo "Price = ₹500<br><br>";
		$total_price+=500;
	}
	else if($sport=="basketball" and $gender == "Female")
	{
		echo "Price = ₹200<br><br>";
		$total_price+=200;
	}
	else if($sport=="football" and $gender == "Male")
	{
		echo "Price = ₹700<br><br>";
		$total_price+=700;
	}
	else if($sport=="football" and $gender=="Female")
	{
		echo "Price = ₹900<br><br>";
		$total_price+=900;
	}
	else if($sport=="athletics" and $gender=="Female")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="athletics" and $gender=="Male")
	{
		echo "Price = ₹1800<br><br>";
		$total_price+=1800;
	}
	else if($sport=="badminton" and $gender=="Female")
	{
		echo "Price = ₹720<br><br>";
		$total_price+=720;
	}
	else if($sport=="badminton" and $gender=="Male")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="chess" and $gender=="Female")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="chess" and $gender=="Female")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="cricket")
	{
		echo "Price = ₹3000<br><br>";
		$total_price+=900;
	}
	else if($sport=="cross_country" and $gender=="Female")
	{
		echo "Price = ₹250<br><br>";
		$total_price+=250;
	}
	else if($sport=="cross_country" and $gender=="Male")
	{
		echo "Price = ₹600<br><br>";
		$total_price+=600;
	}
	else if($sport=="hockey")
	{
		echo "Price = ₹3000<br><br>";
		$total_price+=3000;
	}
	else if($sport=="squash" and $gender=="Female")
	{
		echo "Price = ₹250<br><br>";
		$total_price+=250;
	}
	else if($sport=="squash" and $gender=="Male")
	{
		echo "Price = ₹250<br><br>";
		$total_price+=250;
	}
	else if($sport=="swimming" and $gender=="Female")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="swimming" and $gender=="Male")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="table_t" and $gender=="Female")
	{
		echo "Price = ₹250<br><br>";
		$total_price+=250;
	}
	else if($sport=="table_t" and $gender=="Male")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="volleyball")
	{
		echo "Price = ₹1800<br><br>";
		$total_price+=1800;
	}
	else if($sport=="handball")
	{
		echo "Price = ₹1800<br><br>";
		$total_price+=1800;
	}
	else if($sport=="lawn_t" and $gender=="Male")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
	else if($sport=="lawn_t" and $gender=="Female")
	{
		echo "Price = ₹250<br><br>";
		$total_price+=250;
	}
	else if($sport=="throwball")
	{
		echo "Price = ₹1200<br><br>";
		$total_price+=1200;
	}
}
echo "Total price = ₹" . $total_price;
if(isset($_POST["submit"]))
{
	/* let's say we get around 200 teams in total, so we will generate a random number between 1 to 200, if the team id exists, another number will be generated otherwise the number will be assigned to a team*/
	
	$t_id = rand(1,200);
	$team_id = recur_unique_team_id($t_id);
	//flag to check if the query has failed or not
	$flag = 1;
	
	foreach ($ret_info as $delegate_number)
	{
		if(insert_team_info($team_id,$delegate_number,$gender,$sport,$_SESSION["user_id"],$_SESSION["admin_id"]) < 0)
		{
			//query has failed, break out of the loop
			$flag = $delegate_number;
			break;
		}
	}
	
	if($flag==1)
	{
		//all queries were successful, generate team id
		$_SESSION["team_id"] = $team_id;
		redirect_to("final_page.php");
	}

	else
	{
		$_SESSION["bitched_out"] = $flag;
		redirect_to("failed_query.php");
	}

}
echo "<form method='POST' target=''>
	<br><input type='submit' name='submit' value='Confirm payment'></form>";
?>