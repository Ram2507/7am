<?php include("header.php");?>
		<h1>Register Here</h1>
		
		<?php 
		if(isset($_POST['register']))
		{
			//step4
			include("connection.php");
			
			//step3
			$name=$_POST['name'];
			$email=$_POST['email'];
			$pwd=md5($_POST['pass']);
			$mobile=$_POST['mobile'];
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$state=$_POST['state'];
			$city=$_POST['city'];
			$terms=$_POST['terms'];
			$addr=$_POST['address'];
			
			date_default_timezone_set("Asia/Calcutta");
			$cdate=date("Y-m-d h:i:s");
			$ip=$_SERVER['REMOTE_ADDR'];
			
			//step5:insert data into DB
			mysqli_query($con,
			"insert into register(username,email,password,mobile,
			gender,dob,state,city,address,terms,ip,date_of_reg) 
			values('$name','$email','$pwd','$mobile',
			'$gender','$dob','$state','$city','$addr','$terms',
			'$ip','$cdate')");
			
			if(mysqli_affected_rows($con)==1)
			{
				//step6: Send Email Notification
				$id=base64_encode(mysqli_insert_id($con));
				
				$subject="Account Activation-GOPHP";
				
				$message="Hi ".ucfirst($name).",<br><br>
				Thanks, for registering with us,your account
				hasbeen created successfully. Your account 
				details are:<br><br>Account ID:Your Email<br>
				Password:".$_POST['pass']."<br><br> To get Access
				with our website please click the below link
				to activate your account<br><br>
				<a target='_blank' 
				href='http://localhost:8080/7am/activate.php?key=".$id."'>
				Activate Now</a><br><br>Thanks<br>GoPHP";
				
				$headers="Content-Type:text/html   ";
				
				if(mail($email,$subject,$message,$headers))
				{
					echo "<p>Registered Successfully. 
					Please Activate your Account</p>";
				}
				else
				{
					echo "<p>Sorry! Network Error...</p>";
				}
				
			}
			else
			{
				echo "<p>".mysqli_error($con)."</p>";
			}
			
		}
		
		?>
		
		<form action="" method="POST" 
		onsubmit="return validate()">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" id="pass"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cpass" id="cpass"></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><input type="text" name="mobile" id="mobile"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" id="gender" 
						value="Male">Male &nbsp;
						<input type="radio" name="gender" id="gender" 
						value="Female">Female &nbsp;
					</td>
				</tr>
				
				<tr>
					<td>DOB</td>
					<td><input type="text" name="dob" id="dob">(YYYY-MM-DD)</td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea name="address" id="address"></textarea></td>
				</tr>
				
				<tr>
					<td>State</td>
					<td><select name="state" id="state">
						<option value="">----Select State----</option>
						<option value="Andhrapradesh">Andhrapradesh</option>
						<option value="Telangana">Telangana</option>
						<option value="Maharastra">Maharastra</option>
						<option value="Tamilnadu">Tamilnadu</option>
						<option value="Uttarapradesh">Uttarapradesh</option>
					</select></td>
				</tr>
			
				<tr>
					<td>City</td>
					<td><input type="text" name="city" id="city"></td>
				</tr>
				<tr>
					<td></td>
					<td><input value="1" type="checkbox" name="terms" 
					id="terms">Please Accept <a href=''>Terms and Conditions</a></td>
				</tr>
			
				<tr>
					<td></td>
					<td>
						<input value="Register" type="submit" name="register">
						<input value="Reset" type="reset">
					</td>
				</tr>
			
			
			</table>
		</form>
		<script>
			function validate()
			{
			
				if(document.getElementById("name").value=="")
				{
					alert("Enter Username");
					return false;
				}
				if(document.getElementById("email").value=="")
				{
					alert("Enter Email");
					return false;
				}
				if(document.getElementById("pass").value=="")
				{
					alert("Enter Password");
					return false;
				}
				if(document.getElementById("cpass").value=="")
				{
					alert("Enter Confirm Password");
					return false;
				}
				if(document.getElementById("pass").value != 
				document.getElementById("cpass").value)
				{
					alert("Passwords DOes not Match");
					return false;
				}
				
				
			}
		</script>
<?php include("footer.php")?>