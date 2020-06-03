<?php 
	$con = mysqli_connect("localhost", "root", "","profwaititu");
	if($con){
		$tid = $_GET['tid'];
		$approve=mysqli_query($con,"UPDATE request set status='Read' where tid='$tid'");
		echo "You have read this message";
		header('refresh:0.0000001;url=displayservice.php');
	}
	else
	{
		echo "not connected";
	}

 ?>