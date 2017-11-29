<html>
	<head>
		<title>File Uploading</title>
	</head>
	<body>
		<h1>File Uploading</h1>
		<?php 
			
			if(isset($_POST['submit']))
			{

				$c=count($_FILES["image"]["name"]);		
				for($i=0;$i<$c;$i++)
				{
					if(is_uploaded_file($_FILES['image']['tmp_name'][$i]))
					{
						$filename=$_FILES['image']['name'][$i];
						$size=$_FILES['image']['size'][$i];
						$type=$_FILES['image']['type'][$i];
						$tmp=$_FILES['image']['tmp_name'][$i];
						$error=$_FILES['image']['error'][$i];
						
						$ext=substr($filename,strpos($filename,"."));
						$str="1234567890abcdefghijklmnopqrstuvwxyz";
						$uq=substr(str_shuffle($str),10,16)."_".time().$i;
						
						
						
						//check file size
						if($size<(1024*1024))
						{
							if($ext==".jpg" || $ext==".png" || $ext==".gif")
							{
								if(move_uploaded_file($tmp,"uploads/".$uq."_".$filename))
								{
									echo "<p>".$filename." is Uploaded Successfully</p>";
								}
								else
								{
									echo "<p>".$filename." Sorry Unable to Upload</p>";
								}
							}
							else
							{
								echo "<p>".$filename." is nota valid image</p>";
							}
						}
						else
						{
							echo "<p>".$filename."  size should below 1MB</p>";
						}
						
						
						
					}
					else
					{
						echo "Please sleect a file to upload";
					}
				}
			}
		?>
		
		
		<form action="" method="POST" 
		enctype="multipart/form-data">
			<table>
				
				<tr>
					<td>Upload Avatar</td>
					<td><input type="file" multiple name="image[]"></td>
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