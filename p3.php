<html>
	<head>
		<title>Session and Cookie</title>
	</head>
	<body>
		<form method="POST" action="p4.php">
			Enter Number3:<br>
			<input type="text" name="num3">
			<input type="submit" value="Go">
		</form>
	</body>
</html>
<?php //setcookie("number2",$_POST['num2']) ?>
<?php //setcookie("number2",$_POST['num2'],time()+120); ?>
<?php 
	session_start();
	$_SESSION['number2']=$_POST['num2'];
 ?>