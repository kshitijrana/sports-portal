<?php
session_start();
if(isset($_SESSION["excep_id"]))
{
	echo "Delegate number " . $_SESSION["excep_id"] . " has already registered for " . $_SESSION["sport"];
}
else
{
	echo "Something is missing.<a href='get_info.php'>Go back</a>";
}
?>