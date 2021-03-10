<?php
	ob_start();
	session_start();
	
	foreach ($_SESSION as $key => $values) {
		$_SESSION[$key] = "";
	}
	
    $_SESSION = array();
    session_destroy();
	
    header('refresh:1 url=../index.php');
	ob_end_flush();
?>