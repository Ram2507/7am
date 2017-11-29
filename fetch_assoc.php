<html>
	<head>
		<title>Displaying Data</title>
		<style>
			table{
				border-collapse:collapse;
				text-align:center;
				margin:0px auto;
			}
			table td{padding:4px;}
			table th{
				padding:6px;
				background-color:green;
				color:#fff;
			}
			table tr:nth-child(even){
				background-color:#efefef;
			}
			table tr:nth-child(odd){
				background-color:#d4d4d4;
			}
			table tr:hover{
				background-color:#d8d8d8;
			}
			h1{text-align:center;}
		</style>
	</head>
	<body>
		<h1>Displaying Contacts</h1>
		<?php 
		//connect to DB
		$con=mysqli_connect("localhost","root","","7am") or
		die("Unable to Connect");
		
		$result=mysqli_query($con,"select *from contact
		order by username ASC");
		
		if(mysqli_num_rows($result)>0)
		{
		
		?>
		
		<table border=1>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Message</th>
			</tr>
			
			<?php 
			while($row=mysqli_fetch_assoc($result))
			{
				?>
					<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo $row['username']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['mobile']?></td>
						<td><?php echo $row['city']?></td>
						<td><?php echo $row['message']?></td>
					</tr>
				<?php
			}
			?>
			
		</table>
		<?php
		}
		else
		{
			?>
				<p>Sorry! No Records Found</p>
			<?php
		}
		?>
	</body>
</html>