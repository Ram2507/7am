<?php 
$f1=0;
$f2=1;
$num=10;
echo $f1." ".$f2." ";

for($i=0;$i<=$num;$i++)
{
	$f3=$f1+$f2;
	echo $f3." ";
	$f1=$f2;
	$f2=$f3;
}

?>