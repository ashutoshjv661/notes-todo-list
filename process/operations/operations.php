<?php
	session_start();
	require '../../functions/dbconn.php';
	require '../../functions/general.php';
	require '../../functions/dbfunc.php';


	if (isset($_POST['addCustomer'])) {
		$id = getsl($conn, 'id', 'customer');
		$sql = "INSERT INTO customer (id, name, address, mail, con) VALUES ('".$id."', '".$_POST['cname']."', '".$_POST['addr']."', '".$_POST['mail']."','".$_POST['mob']."')";
		if (mysqli_query($conn, $sql)) {
			header('location:../../addcustomer.php?msg=1');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}


	if(isset($_GET['return'])){ //function for clear session of returnable.php page
		if($_GET['return']== "cancel"){
			$_SESSION['rcid'] = NULL;
			$_SESSION['rcname'] = NULL;
			$_SESSION['rcmob'] = NULL;
			header('location:../../returnable.php');
		}
	}

	if(isset($_POST['rentry'])){
		$qty = $_POST['qty'];
		$action = $_POST['status'];
		$gas = $_POST['ctype'];
		$tdate = date("Y-m-d");
		$cid = $_SESSION['rcid'];
		$cname = $_SESSION['rcname'];

		$checkid = countData($conn, "id", "cdata", "cid", $cid);
		if($checkid[0]){ //checking customer id present or not in cdata
			// $checkdate = countData2($conn, "id", "cdata", "cid", $cid, "udate", $tdate,"ctype", $ctype);
			$sql = "SELECT count(id) FROM cdata WHERE cid = '$cid' AND udate = '$tdate' AND ctype = '$gas'";
			$checkdate = mysqli_query($conn, $sql) or die ("Invalid query: " . mysql_error());
    	$checkdate = mysqli_fetch_row($checkdate);
			if($checkdate[0]){ //checking today date & cylinder present or not in cdata
				$flag = 1;
				$sl = getsl($conn,"id","cdata");
				$res = updatecdata($conn, $sl, $cid, $cname, $gas, $tdate, $qty, $action, $flag);
				if($res == 1){
					header('location:../../returnable.php?msg=1');
				}
				if($res == 2){
					header('location:../../returnable.php?msg=2');
				}
				if($res == 3){
					header('location:../../returnable.php?msg=3');
				}
			}else{ //today date & cylinder is not present
				$flag = 2;
				$sl = getsl($conn,"id","cdata");
				$res = updatecdata($conn, $sl, $cid, $cname, $gas, $tdate, $qty, $action, $flag);
				if($res == 1){
					header('location:../../returnable.php?msg=1');
				}
				if($res == 2){
					header('location:../../returnable.php?msg=2');
				}
				if($res == 3){
					header('location:../../returnable.php?msg=3');
				}
			}
		}else{ 
			$sl = getsl($conn,"id","cdata");
			$res = insertcdata($conn, $sl, $cid, $cname, $gas, $tdate, $qty, $action);
			if ($res) {
				if($res == 1){
					header('location:../../returnable.php?msg=1');
				}
				if($res == 2){
					header('location:../../returnable.php?msg=2');
				}
				if($res == 3){
					header('location:../../returnable.php?msg=3');
				}
			}else{
				echo "error";
			}
		}

	}

?>