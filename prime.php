<?php 
$num=20;
for($i=2;$i<=$num;$i++)
{
	for($j=2;$j<$i;$j++)
	{
		if($i%$j==0)
		{
			break;
		}
	}
	
	if($i==$j)
	{
		echo $i."<br>";
	}
}

?>

 