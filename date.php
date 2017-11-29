<?php 
//echo date("w");//number of the day(0-sun,1-mon,...sat-6)
//echo date("Y-m-d");
//echo date("l,dS M Y");

//echo date_default_timezone_get();
//date_default_timezone_set("Pacific/Auckland");
//date_default_timezone_set("Australia/Melbourne");
//date_default_timezone_set("Asia/Kualalumpur");
//date_default_timezone_set("America/Jamaica");
date_default_timezone_set("Asia/Calcutta");
//echo date('Y-m-d h:i:s a');
//Tuesday, 31st October 2017 7:30:10 AM
//echo date("l, dS F Y g:i:s A");
//echo time();
//echo date("d-m-Y h:i:s a",time());
//echo date("l F",time());

//echo strtotime("25-07-1987");//554149800
//echo date("l", strtotime("25-07-1987"));

$d1="1993-06-23";
$d2="1987-07-25";
$diff=strtotime($d1)-strtotime($d2);
echo ($diff/86400)/365;

//echo date("l,Y-M-dS	 h:i:s",strtotime("10days 4 weeks"));

date_default_timezone_get(): we can get the default time zone
date_default_timezone_set: we can set the time zone of a city

date_default_timezone_set("Asia/Calcutta");
date_default_timezone_set("Pacific/Auckland");
date_default_timezone_set("Australia/Melbourne");
date_default_timezone_set("America/Jamaica");


?>


