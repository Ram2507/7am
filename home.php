<?php 
session_start();

if(isset($_SESSION['loggedin_id']))
{
	include("connection.php");
	$uid=$_SESSION['loggedin_id'];
	$res=mysqli_query($con,"select *from register where id=$uid");
	$row=mysqli_fetch_assoc($res);
	?>
		<html>
			<head>
				<title>Welcome to 
				<?php echo ucfirst($row['username']);?>
				</title>
				<link href="css/style.css" rel="stylesheet">
			</head>
			<body>
				<div class="container">
					<?php include("menu.php");?>
					<div class="content">
						<h1>
						<?php if($row['profile_pic']!=""){ ?>
						<Img class="avatar" src="profiles/<?php echo $row['profile_pic']?>" height="50" width="50">
						<?php }?>
						Welcome to <?php echo ucfirst($row['username']); ?>
						</h1>
						<table>
						<tr>
							<td>Username</td>
							<td><?php echo ucfirst($row['username']);?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo ($_SESSION['loggedin_email']);?></td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td><?php echo $row['mobile'];?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><?php echo $row['gender'];?></td>
						</tr>
						<tr>
							<td>DOB</td>
							<td><?php echo $row['dob'];?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo $row['address'];?></td>
						</tr>
						<tr>
							<td>City</td>
							<td><?php echo $row['city'];?></td>
						</tr>
						<tr>
							<td>State</td>
							<td><?php echo $row['state'];?></td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td><?php echo $row['mobile'];?></td>
						</tr>
						<tr>
							<td>Date of Reg</td>
							<td><?php echo date("l, dS M Y",
strtotime($row['date_of_reg']));?></td>
						</tr>
					</table>
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