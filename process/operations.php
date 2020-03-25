<?php
require "../function/dbconn.php";

?>
<?php
if(isset($_GET['id']))
{
		$id = $_GET['id'];
		$sql = "DELETE FROM tb WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			echo "Error";
			exit();
		}
		header('location:../index.php?msg=1');
}

if(isset($_POST['edit']))
{
		$id = $_POST['eid'];
		$name=$_POST['name'];
        $dob=$_POST['dob'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        
        $sql = "UPDATE `tb` SET `name`='".$name."',`dob`='".$dob."',`mobile`='".$mobile."',`email`='".$email."', `address`='".$address."',`password`='".$password."' where id='".$id."'";
        	$result = mysqli_query($conn, $sql);
        	if(!$result)
        	{
			echo "Error";
			exit();
			}
			header('location:../index.php?msg=3');
}


?>
