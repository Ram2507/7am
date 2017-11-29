<?php 
session_start();
if(isset($_SESSION['loggedin_id']))
{
	include("connection.php");
	$uid=$_SESSION['loggedin_id'];
	$res=mysqli_query($con,"select username,password,profile_pic 
	from register where id=$uid");
	$row=mysqli_fetch_assoc($res);
	?>
		<html>
			<head>
				<title><?php echo ucfirst($row['username']);?> 
				- Change Password</title>
				<link href="css/style.css" rel="stylesheet">
			</head>
			<body>
			<div class="container">
				
				<?php include("menu.php")?>
				<div class="content">
				<h1>
					<?php if($row['profile_pic']!=""){ ?>
					<Img class="avatar" src="profiles/
					<?php echo $row['profile_pic']?>" height="50" width="50">
					<?php }?>
					<?php echo ucfirst($row['username']); ?> - Change Password
				</h1>
				
				<?php 
				if(isset($_POST['update']))
				{
					$opwd=md5($_POST['pwd']);
					$npwd=md5($_POST['npwd']);
					$cnpwd=md5($_POST['cnpwd']);
					if($row['password']==$opwd)
					{
						if($npwd==$cnpwd)
						{
							//update PWD here
							mysqli_query($con,"update register set 
							password='$npwd' where id=$uid");
							if(mysqli_affected_rows($con)==1)
							{
								setcookie("success",
								"Password Changed Successfully,Pleas Login Again.",
								time()+3);
								header("Location:logout.php");
							}
						}
						else
						{
							echo "<p>Passwords DOes not Match</p>";
						}
					}
					else
					{
						echo "<p>Old Password Does not Match with DB password</p>";
					}
				}
				
				?>
				
				
				
				<form method="POST" action="">
					<table>
						<tr>
							<td>Old Password</td>
							<td><input type="password" name="pwd"></td>
						</tR>
						<tr>
							<td>Enter New Password</td>
							<td><input type="password" name="npwd"></td>
						</tR>
						<tr>
							<td>Confirm New Password</td>
							<td><input type="password" name="cnpwd"></td>
						</tR>
						<tr>
							<td></td>
							<td><input type="submit" name="update"
							value="Update"></td>
						</tR>
					</table>
				</form>
				</div>
				<div class="footer">
					<p>2017 &copy; Copy rights Reserved</p>
				</div>
			</div>
				
			</body>
		</html>
	<?php
}
else
{
	header("Location:login.php");
}

?>