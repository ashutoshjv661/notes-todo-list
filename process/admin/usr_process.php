<?php
	require '../../functions/dbconn.php';
	require '../../functions/general.php';
	if (isset($_POST['addRole'])) {
		if(!empty($_POST['code'])) {
			$a_code = "INDEX;";
			foreach($_POST['code'] as $code) {
				$a_code .= $code.";";
			}
			$id = getsl($conn, 'id', 'roles');
			$sql = "INSERT INTO roles (id, rname, rdesc, acc_code) VALUES ('".$id."', '".$_POST['role']."', '".$_POST['r_desc']."', '".$a_code."')";
			if (mysqli_query($conn, $sql)) {
				header('location:../../user_mgnt.php?msg=2');
			} else {
				$err = mysqli_error($conn);
				if(strpos($err, 'Duplicate entry') !== false){
					header('location:../../user_mgnt.php?msg=9');
				}else{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}else{
			header('location:../../user_mgnt.php?msg=1');
		}
	}
	
	if(isset($_GET['delrole'])){
		$id = $_GET['delrole'];
		$sql = "DELETE FROM roles WHERE id = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location:../../user_mgnt.php?msg=3');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if (isset($_POST['editRole'])) {
		if(!empty($_POST['code'])) {
			$a_code = "INDEX;";
			foreach($_POST['code'] as $code) {
				$a_code .= $code.";";
			}
			$sql = "UPDATE roles SET rname = '".$_POST['role']."', rdesc = '".$_POST['r_desc']."', acc_code = '".$a_code."' WHERE id = '".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../../user_mgnt.php?msg=4');
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}else{
			header('location:../../edit_role.php?msg=1');
		}
	}

	if (isset($_POST['addUser'])) {
		$id = getsl($conn, 'id', 'users');
		$date = date("d/m/Y H:m A");
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$pass = sha1($pass);
		$sql = "INSERT INTO users (id, username, fname, pass, role, active, llogin) VALUES ('".$id."', '".$_POST['username']."', '".$_POST['fname']."', '".$pass."', '".$_POST['role']."', '1', '".$date."')";
		if (mysqli_query($conn, $sql)) {
			header('location:../../user_mgnt.php?msg=5');
		} else {
		    $err = mysqli_error($conn);
			if(strpos($err, 'Duplicate entry') !== false){
				header('location:../../user_mgnt.php?msg=8');
			}else{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}

	if (isset($_POST['editUser'])) {
		if(!$_POST['pass']){
			$sql = "UPDATE users SET username = '".$_POST['username']."', fname = '".$_POST['fname']."', role = '".$_POST['role']."', active = '".$_POST['active']."' WHERE id = '".$_POST['id']."'";
		}else{
			$pass = mysqli_real_escape_string($conn, $_POST['pass']);
			$pass = sha1($pass);
			$sql = "UPDATE users SET username = '".$_POST['username']."', fname = '".$_POST['fname']."', pass = '".$pass."', role = '".$_POST['role']."', active = '".$_POST['active']."' WHERE id = '".$_POST['id']."'";
		}
		if (mysqli_query($conn, $sql)) {
			header('location:../../user_mgnt.php?msg=6');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
	}

     
   


	if(isset($_GET['deluser'])){
		$id = $_GET['deluser'];
		$sql = "DELETE FROM users WHERE id = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location:../../user_mgnt.php?msg=7');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}


   if (isset($_POST['editexpense'])) {
			$sql = "UPDATE expense SET reason = '".$_POST['edit_reason']."', note = '".$_POST['edit_note']."', amount = '".$_POST['new_amount']."' WHERE id = '".$_POST['id']."' ";
			if (mysqli_query($conn, $sql)) {
				header('location:../../expense.php?msg=4');
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	
    if(isset($_GET['delexpense'])){
		$id = $_GET['delexpense'];
		$sql = "DELETE FROM expense WHERE id = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location:../../expense.php?msg=7');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}


	if (isset($_POST['editfuel'])) {
			$sql = "UPDATE fuel SET type = '".$_POST['type']."',stock = '".$_POST['stock']."', price = '".$_POST['price']."', des = '".$_POST['des']."' WHERE id = '".$_POST['id']."' ";
			if (mysqli_query($conn, $sql)) {
				header('location:../../fuel.php?msg=4');
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	
    if(isset($_GET['delfuel'])){
		$id = $_GET['delfuel'];
		$sql = "DELETE FROM fuel WHERE id = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location:../../fuel.php?msg=7');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if (isset($_POST['editsales'])) {
			$sql = "UPDATE sales SET sales_type = '".$_POST['type']."',machine_code = '".$_POST['machine_code']."', starting_reading = '".$_POST['starting_reading']."', ending_reading = '".$_POST['ending_reading']."' ,sales_amount = '".$_POST['sales_amount']."',sales_description = '".$_POST['sales_description']."' WHERE id = '".$_POST['id']."' ";
			if (mysqli_query($conn, $sql)) {
				header('location:../../sales_view.php?msg=4');
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	
    if(isset($_GET['delsales'])){
		$id = $_GET['delsales'];
		$sql = "DELETE FROM sales WHERE id = '$id'";
		if (mysqli_query($conn, $sql)) {
			header('location:../../sales_view.php?msg=7');
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}



?>