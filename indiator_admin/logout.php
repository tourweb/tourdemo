<?php
	$_SESSION['admin_id'] = FALSE;   
	header("Location:index.php");     
	session_destroy();
?>