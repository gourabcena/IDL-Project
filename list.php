<!DOCTYPE html>
<html>
<body>
<?php
	include "db.php";
	$sql="SELECT * from user WHERE u_id IN(SELECT u_id from roleuser WHERE r_id!=1 and status IS NULL)";
	if(mysqli_query($con,$sql)){
	$sql1="UPDATE roleuser SET status=1 WHERE status IS NULL";
	mysqli_query($con,$sql1);
	}
	else{
	echo"Failure";
	}
?>
</body>
</html>
