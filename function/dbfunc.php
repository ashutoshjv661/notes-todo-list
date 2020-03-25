<?php
	require "dbconn.php";
	
	?>

<?php	

	function getid($conn, $id, $table)
	{
		$query = "SELECT max($id) FROM $table";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
		$id=$row[0];
		if(!$id)
		{
			$id=1;
			return $id;
		}
		else
		{
			$id=$id+1;
			return $id;

		}

	}

	function inserttb($conn, $name, $dob, $mobile, $email, $address, $password)
	{
		$id = getid($conn, "id","tb");
		$sql = "INSERT INTO `tb` (`id`, `name`, `dob`, `mobile`, `email`, `address`, `password`) VALUES ( '".$id."','".$name."', '".$dob."', '".$mobile."', '".$email."', '".$address."', '".$password."')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			echo "Error".mysqli_error($conn);
			exit();
		}
		return $result;
	}

	function readtb($conn, $table)
	{
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			echo "Error";
			exit();
		}
		return $result;
	}

	function deletetb($conn, $table,$id)
	{
		$sql = "";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			echo "Error";
			exit();
		}
		return $result;
	}
	
	
		
?>