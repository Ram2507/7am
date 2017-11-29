
<html>
	<head>
		<title>File Uploading</title>
	</head>
	<body>
		<h1>File Uploading</h1>
		<?php 
			
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
				$email=$_POST['email'];
				$pwd=$_POST['pwd'];
				
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
							if(move_uploaded_file($tmp,"uploads/".$uq."_".$filename))
							{
								echo "<p>FIle Uploaded Successfully</p>";
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
					<td>Username</td>
					<td><input type="text" name="uname"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pwd"></td>
				</tr>
				<tr>
					<td>Upload Avatar</td>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit"
					value="Register"></td>
				</tr>
			</table>
		</form>
	</body>
	</html>