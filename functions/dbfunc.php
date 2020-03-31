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


 	function getTopStock($conn){
		$sql = "SELECT * FROM stock ORDER BY id desc LIMIT 4";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}else{
			return $result;
		}
	}

	function datewiseDetailedReport($conn, $from, $to){
		$sql = "SELECT * FROM entry where edate BETWEEN '$from' AND '$to'";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function datewiseStockReport($conn, $from, $to){
		$sql = "SELECT * FROM stock where edate BETWEEN '$from' AND '$to'";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}



