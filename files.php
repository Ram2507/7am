<style>
	img{
		border-bottom:5px solid #a40000;
		border-top:5px solid green;
		border-left:5px solid #1e6a9b;
		border-right:5px solid blue;
		margin:20px;
		padding:5px;
		border-radius:50%;
	}
	img:hover{
		border-bottom:6px solid green;
		border-top:6px solid #a40000;
		border-left:6px solid blue;
		border-right:6px solid #1e6a9b;

	}
</style>
<?php 

$fp=opendir("images");
for(;$f=readdir($fp);)
{
	if(!($f=="." || $f==".."))
	{
		echo "<img src='images/$f' height='100' 
		width='100'>";
	}
}

/*$file="C:/Users/PHP/Desktop/uploads";
if(file_exists($file))
{
	rmdir($file);
	echo $file." is deleted..";
}
else
{
	echo $file." already Deleted..";
}
*/

//echo getcwd();




//date_default_timezone_set("Asia/Kolkata");
//echo date("D,d-m-Y h:i:s a",filemtime("files.php"));

/*
$file="welcome.txt";
if(file_exists($file))
{
	unlink($file);
	echo $file." is Deleted...";
}
else
{
	echo $file." is not found";
}
*/

//echo is_file("test");//1
//echo file_exists("test");



//echo file_put_contents("test.txt","Welcome");

/*echo file_get_contents("http://localhost:8080/ciapp");
echo file_get_contents("welcome.txt");
echo file_get_contents("php://input");
*/

/*$fp=fopen("http://localhost:8080/ciapp","r");

echo fread($fp,filesize("http://localhost:8080/ciapp"));
*/
?>
<!--
Note: if the specified file is not
avaliable when writing data in append
mode,it will creates a new file with
specified file name
-->