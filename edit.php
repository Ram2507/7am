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
				<title>Ram - Edit Profile</title>
				<link href="css/style.css" rel="stylesheet">
			</head>
			<body>
				<div class="container">
				<?php include("menu.php");?>
					<h1>
						<?php if($row['profile_pic']!=""){ ?>
						<Img class="avatar" src="profiles/<?php echo $row['profile_pic']?>" height="50" width="50">
						<?php }?>
						<?php echo ucfirst($row['username']); ?> - Edit Profile
						</h1>
				
				<?php 
				
					if(isset($_GET['status']))
					{
						echo "<P>Updated Successfully</p>";
					}
				
					if(isset($_POST['update']))
					{
						$name=$_POST['name'];
						$mobile=$_POST['mobile'];
						$dob=$_POST['dob'];
						$gender=$_POST['gender'];
						$city=$_POST['city'];
						$state=$_POST['state'];
						$addr=$_POST['address'];
						mysqli_query($con,
						"update register set username='$name',
						mobile='$mobile',dob='$dob',gender='$gender',
						city='$city',state='$state',address='$addr'
						 where id=$uid");
						 if(mysqli_affected_rows($con)==1)
						 {
							 header("Location:edit.php?status=true");
						 }
						 else
						 {
							echo mysqli_error($con);
							 if(mysqli_errno($con)==0)
							 {
								 echo "<p>You does not chnage fields<p>";
							 }
						 }
					}
				?>
				<div class="content">
					<form action="" method="POST">
						<table>
							<tr>
								<td>Username</td>
								<td><input value="<?php echo $row['username']?>"
								type="text" name="name" id="name"></td>
							</tr>
							
							<tr>
								<td>Mobile</td>
								<td><input value="<?php echo $row['mobile']?>" 
								type="text" name="mobile" id="mobile"></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>
									<input type="radio" name="gender" id="gender" 
									value="Male" 
									<?php if($row['gender']=="Male") echo "checked"?>>Male &nbsp;
									<input type="radio" name="gender" id="gender" 
									value="Female" 
									<?php if($row['gender']=="Female") echo "checked"?>>Female &nbsp;
								</td>
							</tr>
							
							<tr>
								<td>DOB</td>
								<td><input value="<?php echo $row['dob']?>" 
								type="text" name="dob" id="dob">(YYYY-MM-DD)</td>
							</tr>
							<tr>
								<td>Address</td>
								<td><textarea name="address" 
								id="address"><?php echo $row['address']?></textarea></td>
							</tr>
							
							<tr>
								<td>State</td>
								<td><select name="state" id="state">
									<option value="">----Select State----</option>
									<option value="Andhrapradesh" 
									<?php if($row['state']=="Andhrapradesh") echo "selected"?>>
									Andhrapradesh</option>
									<option value="Telangana" 
									<?php if($row['state']=="Telangana") echo "selected"?>>
									Telangana</option>
									<option value="Maharastra" <?php if($row['state']=="Maharastra") echo "selected"?>>Maharastra</option>
									<option value="Tamilnadu" <?php if($row['state']=="Tamilnadu") echo "selected"?>>Tamilnadu</option>
									<option value="Uttarapradesh" <?php if($row['state']=="Uttarapradesh") echo "selected"?>>Uttarapradesh</option>
								</select></td>
							</tr>
						
							<tr>
								<td>City</td>
								<td><input value="<?php echo $row['city']?>"
								type="text" name="city" id="city"></td>
							</tr>
							
						
							<tr>
								<td></td>
								<td>
									<input value="Update" 
									type="submit" name="update">
									
								</td>
							</tr>
						
						
						</table>
					</form>
				</div><!--Content Div End-->
				<div class="footer">
					<p>2017 &copy; Copy rights Reserved</p>
					</div>
				
			</div><!--Container End-->
				
			</body>
		</html>
	<?php
}
else
{
	header("Location:login.php");
}

?>