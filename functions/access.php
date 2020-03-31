<?php

	if(!isset($_SESSION['user_id'])){
		header('location:login.php');
		exit();
	}

	$user_access = $_SESSION['user_access'];
	
	

	function fuc_access($id){
		$user_access = $_SESSION['user_access'];
		if(!in_array($id, $user_access)){
			return false;
		}else{
			return true;
		}
	}
?>