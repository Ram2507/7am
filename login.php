<?php session_start(); ?>
<?php 
include("header.php");
?>
		<h1>Login</h1>
		
		<?php 
		if(isset($_COOKIE['success']))
		{
			echo "<p>".$_COOKIE['success']."</p>";
		}
		
		?>
		
		<?php 
			if(isset($_POST['login']))
			{
				include("connection.php");
				$email=$_POST['email'];
				$pwd=md5($_POST['pass']);
				$res=mysqli_query($con,"select *from register 
				where email='$email' and password='$pwd'");
				
				if(mysqli_num_rows($res)==1)
				{
					$row=mysqli_fetch_assoc($res);
					if($row['status']=="Active")
					{
						$_SESSION['loggedin_id']=$row['id'];
						$_SESSION['loggedin_email']=$row['email'];
						$_SESSION['loggedin_name']=$row['username'];
						header("Location:home.php");
					}
					else
					{
						echo "<p>Please Activate your account</p>";
					}
				}
				else
				{
					echo "<p>Sorry! Wrong Credentials</p>";
				}
				
			}
		?>
		
		
		<form method="POST" action="" onsubmit="return validation()">
			<table>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" id="email"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="pass" id="pass"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Login">
					<a href="forgot.php">Forgot Password?</a></td>
				</tr>
			</table>
		</form>
		<script>
			function validation()
			{
				if(document.getElementById("email").value=="")
				{
					alert("Enter Email");
					return false;
				}
				if(document.getElementById("pass").value=="")
				{
					alert("Enter Password");
					return false;
				}
			}
		</script>
		
		
	<?php 
include("footer.php");
?>