<?php 

/*$name=$_GET['username'];
$m=$_GET['mobile'];
$e=$_GET['email'];
$me=$_GET['msg'];*/


/*$name=$_POST['username'];
$m=$_POST['mobile'];
$e=$_POST['email'];
$me=$_POST['msg'];
*/

$name=$_REQUEST['username'];
$m=$_REQUEST['mobile'];
$e=$_REQUEST['email'];
$me=$_REQUEST['msg'];


//connect to DB
//insert data into DB
//
echo "Name:".$name."<br>";
echo "Mobile:".$m."<br>";
echo "Email:".$e."<br>";
echo "Message:".$me."<br>";




?>