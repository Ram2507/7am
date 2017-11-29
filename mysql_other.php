<?php 
$con=mysqli_connect("localhost","root","","7am") or
		die("Unable to Connect");
		
$result=mysqli_query($con,"select *from states");

$num=mysqli_num_fields($result);
if(mysqli_num_rows($result)>0)
{

	?>
	<table border=1>
		<tr>
		<?php
		for($i=0;$i<$num;$i++)
		{
			$col=mysqli_fetch_field($result);
			echo "<th>".ucfirst($col->name)."</th>";
		}
		?>
		</tr>
		<?php 
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr>";
					
					for($i=0;$i<$num;$i++)
					{
						
						$col=mysqli_fetch_fields($result);
						echo "<td>".$row[$col[$i]->name]."</td>";
					}
				echo "</tr>";
			}
		?>
	</table>
	<?php

}
else
{
	echo "<p>No Records</p>";
}

?>