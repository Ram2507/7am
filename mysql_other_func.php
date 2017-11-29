<?php 
$con=mysqli_connect("localhost","root","","7am") or
		die("Unable to Connect");
		
//$result=mysqli_query($con,"select *from contact");
$result=mysqli_query($con,"insert into 
contact(id,username,email,mobile,city) 
values('','Koti123','koti123@mail.com','324234','Hyd')");

echo mysqli_error($con);



?>