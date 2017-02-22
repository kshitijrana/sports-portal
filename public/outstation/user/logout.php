<?php
require_once("../includes/included_functions_delegate.php");
session_unset();
session_destroy();
?>
<script type="text/javascript">
	window.top.location.href = "../";
</script>