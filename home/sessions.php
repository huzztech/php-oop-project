<?php

	session_start();

		
	if(!isset($_SESSION['idis'])){
		header("location:../index.php");
	}

	$filename = strtolower ( basename($_SERVER['PHP_SELF']));	
	
	
	?>