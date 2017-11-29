<?php 
session_start();
if(isset($_SESSION['loggedin_id']))
{
	include("connection.php");
	$uid=$_SESSION['loggedin_id'];
	$res=mysqli_query($con,"select username,profile_pic from register where id=$uid");
	$row=mysqli_fetch_assoc($res);
	?>
		<html>
			<head>
				<title><?php echo ucfirst($row['username']); ?> - Upload Profile</title>
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
						<?php echo ucfirst($row['username']); ?> - Upload Profile
						</h1>
						<?php 
						if(isset($_REQUEST['status']))
						{
							echo "<p>Profile Pic Uploaded Successfully</p>";
						}
						?>
						<?php 
			
							if(isset($_POST['submit']))
							{
								
								
								if(is_uploaded_file($_FILES['image']['tmp_name']))
								{
									$filename=$_FILES['image']['name'];
									$size=$_FILES['image']['size'];
									$type=$_FILES['image']['type'];
									$tmp=$_FILES['image']['tmp_name'];
									$error=$_FILES['image']['error'];
									
									$ext=substr($filename,strpos($filename,"."));
									$str="1234567890abcdefghijklmnopqrstuvwxyz";
									$uq=substr(str_shuffle($str),10,16)."_".time();
									
									
									
									//check file size
									if($size<(1024*1024))
									{
										if($ext==".jpg" || $ext==".png" || $ext==".gif")
										{
											if(move_uploaded_file($tmp,"profiles/".$uq."_".$filename))
											{
												$f=$uq."_".$filename;
												mysqli_query($con,"update register set profile_pic='$f' where id=$uid");
												if(mysqli_affected_rows($con)==1)
												{
													header("Location:upload_profile.php?status=true");
												}
											}
											else
											{
												echo "<p>Sorry Unable to Upload</p>";
											}
										}
										else
										{
											echo "<p>Please Select a valid Image like 
											jpg, png, gif</p>";
										}
									}
									else
									{
										echo "<p>FIle size should below 1MB</p>";
									}
									
									
									
								}
								else
								{
									echo "Please sleect a file to upload";
								}
								
							}
						?>
						
						
						<form action="" method="POST" 
						enctype="multipart/form-data">
							<table>
								
								<tr>
									<td>Upload Avatar</td>
									<td><input type="file" name="image"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit"
									value="Upload"></td>
								</tr>
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
	header("LOcation:login.php");
}

?>