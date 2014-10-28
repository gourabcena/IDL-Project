<!DOCTYPE html>
<html>
<body>
<?php
	/*session_start();
	$dbname=$_SESSION['dbname'];
	$dbname1=$_SESSION['dbname1'];
	$pass=$_SESSION['password'];*/
	/*$_SESSION['error']="Username already exists";*/
	//$con=mysqli_connect("idl.com",$dbname1,$pass,$dbname);
	include "db.php";
	$role = mysqli_real_escape_string($con, $_POST['role']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$url = mysqli_real_escape_string($con, $_POST['url']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$doj = mysqli_real_escape_string($con, $_POST['doj']);
	$gen = mysqli_real_escape_string($con, $_POST['gen']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$pw=md5($password);
	$sql1="SELECT * FROM user WHERE username='$username'";
	$rs=mysqli_query($con,$sql1);
	
	if(mysqli_num_rows($rs)==0){
		$sql="INSERT INTO user (name,username,dob,doj,ph,gender,city,password,drupal,email)
		VALUES ('$name', '$username','$dob','$doj','$phone','$gen','$city','$pw','$url','$email')";
		if (mysqli_query($con,$sql))
		{	
			$sql1="INSERT INTO roleuser(r_id) VALUES('$role')";
			mysqli_query($con,$sql1);
			header('location:login.php');
		}
	}
	else{
		/*$_SESSION['error']="Username already exists";*/
		header('location:adreg.php');
	}	
	mysqli_close($con);
?>
</body>
</html>



