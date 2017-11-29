<html>
	<head>
		<title>Session and Cookie</title>
	</head>
	<body>
		<form method="POST" action="p3.php">
			Enter Number2:<br>
			<input type="text" name="num2">
			<input type="submit" value="Go">
		</form>
	</body>
</html>

<?php //setcookie("number1",$_POST['num1']); ?>
<?php //setcookie("number1",$_POST['num1'],time()+120); ?>
<?php
	session_start();
	$_SESSION['number1']=$_POST['num1']; 
 ?>