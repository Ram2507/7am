<?php
	
	
	$to="rambabburi@gmail.com";
	$subject="Activation Link-GoPHP";
	$message="HI XXX,<br><br>Thanks for registering with our 
	servives.yout account details are:
	<br><br>Username:Yourmail<br>
	Password:23423<br>
	To get access with our website please click the below link 
	to activate your account<br><br>
	<a href=''>Activate Now</A><br><br>THanks<br>Gophp";
	
	$mheaders="Content-Type:text/html"
	."\r\n"."From:Info <info@gophp.in>"
	."\r\n"."reply-to: Ram <ram@mail.com>";
	
	
	echo mail($to,$subejct,$message,$mheaders);