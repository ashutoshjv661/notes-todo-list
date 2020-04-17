<?php
	function getData($conn, $table){
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
	function getNoteData($conn, $table){
		$userid=$_SESSION['user_id'];
		$sql = "SELECT * FROM $table where employee_name = $userid ";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getToDoData($conn, $table){
		$userid=$_SESSION['user_id'];
		$sql = "SELECT * FROM $table where employee_name = $userid ";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
	function getDataById($conn, $table, $id){
		$sql = "SELECT * FROM $table where id=$id";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}


	function countData($conn, $count, $table, $where, $value){
		$sql = "SELECT count($count) FROM $table WHERE $where = '$value'";
		$res = mysqli_query($conn, $sql) or die ("Invalid query: " . mysqli_error($conn));
    	$result = mysqli_fetch_row($res);
    	return $result;
	}

	function datewiseDetailedReport($conn, $from, $to){
		$sql = "SELECT * FROM notes where notes_date BETWEEN '$from' AND '$to'";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}



