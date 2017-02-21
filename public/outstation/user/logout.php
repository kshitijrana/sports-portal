<?php
require_once("../includes/included_functions_delegate.php");
session_unset();
session_destroy();
redirect_to("../");
?>