<!DOCTYPE html>
<html>
<body>
<?php
	include "db.php";
	session_start();
	$username=$_GET['username'];
        $pw=$_GET['password'];
	//echo $pw;
	$pa=md5($pw);
	//echo $pa;
	$sql="SELECT * FROM `user` WHERE username='$username'and password='$pa'";
	$result=mysqli_query($con,$sql);
	//$count=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		header('location:login.php');
		
	}
	else{
		$_SESSION['user']=$username;
		header('location:profile.php');
	}
	mysqli_close($con);
?>

</body>
</html>

