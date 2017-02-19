<?php
function validate_name($var)
{
	return preg_match("/^[a-zA-z'. ]+$/", $var);	
}
function validate_reg($var)
{
	return preg_match("/^[0-9a-zA-Z ]+$/", $var);
}
function validate_college($var)
{
	return preg_match("/^[a-zA-z'. ]+$/", $var);	
}
function validate_email($var)
{
	return filter_var($var, FILTER_VALIDATE_EMAIL)?1:0; 
}
function validate_gender($var)
{
	return in_array($var,array("male","female"));
}
function validate_phone($var)
{
	return preg_match("/^[+]{0,1}[0-9]{10,15}$/", $var);	
}
function validate_user($var)
{
	return preg_match("/^[0-9]{1,10}$/", $var);	
}
?>