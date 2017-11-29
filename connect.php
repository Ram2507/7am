<?php	
	$con=mysqli_connect("localhost","root","","7am")
	or die("Sorry! Unable to connect");
	$result=mysqli_query($con,"select *from contact");
	
	
	$row=mysqli_fetch_object($result);
	
	echo "<pre>";
	print_r($row->username);
	print_r($row->id);
	print_r($row->email);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*if(mysqli_num_rows($result)>0)
	{
		echo "<table border=1>";
		for(;$row=mysqli_fetch_row($result);)
		{
			echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$row[4]."</td>";
				echo "<td>".$row[5]."</td>";
			
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "Sorry! No records Found";
	}
	
	*/
	
	
	
	
?>


