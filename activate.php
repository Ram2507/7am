<?php 

if(isset($_REQUEST['key']))
{
	include("connection.php");
	$id=base64_decode($_REQUEST['key']);
	mysqli_query($con,"update register set status='Active'
	where id=$id");
	if(mysqli_affected_rows($con)==1)
	{
		echo "<p>Account Activated Successfully.
		Please <a href='login.php'>Login Now</a></p>";
	}
	else
	{
		echo "<p>Account is Already Activated.
		Please <a href='login.php'>Login Now</a></p>";
	}
}




?>