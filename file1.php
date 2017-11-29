<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file upload</title>
</head>
<body>
   <?php
    if(isset($_POST['submit']))
	{
        $name=$_POST['uname'];
        $pwd=$_POST['password'];
        $email=$_POST['email'];
        echo $name,$pwd,$email; 
        
        if(is_uploaded_file($_FILES['image']['tmp_name']))
        {
        
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $error = $_FILES['image']['error'];
        $tmp = $_FILES['image']['tmp_name'];
            
        $ext=substr($name,strpos($name,"."));
        echo "The Filename is:".$name."<br>";
        echo "The Filesize is:".$size."<br>";
        echo "The Filetype is:".$type."<br>";
        echo "The tmp location is:".$tmp."<br>";
        echo "The Error is:".$error."<br>";
            
            if($size<(1024*1024))
            {
                if($ext == ".jpg" )
                {
                    if(move_uploaded_file($tmp,"uploads/$name"))
                    {
                        echo "file uploaded";
                        
                    }
					else
                    {
                        echo "sorry unavle to upload";
                    }
                }
                else
				{
                    echo "please select valid image";
                }
            }
            else
			{
                echo "file should be less then 1mb";
            }
        }

    }
	
    ?>
   
    <form action="" method="post" enctype="multipart/form-data">
        <table>
           <tr>
            <td>
            Username:
            </td>
            <td><input type="text" name="uname"></td>
           </tr>
           <tr>
            <td>
            Password:
            </td>
            <td><input type="password" name="password"></td>
           </tr>
           <tr>
            <td>
            Email:
            </td>
            <td><input type="text" name="email"></td>
           </tr>
            <tr>
            <td>
            Upload
            </td>
            <td><input type="file" name="image"></td>
           </tr>
             <tr>
            <td>
            
            </td>
            <td><input type="submit" name="submit" value="register"></td>
           </tr>
          </table>
    </form>
</body>
</html>