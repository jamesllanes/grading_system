<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body style="background-color:#BDC3C7">
		<form action="Register.php" method="POST">
			<div class=form>
				<table align=center bgcolor="white" bordercolor="white" style="border-radius: 10px;"><!--bordercolor="#006905"-->
					<tr>
						<th colspan=3 align=center>Account Registration Form<hr></th>
					</tr>
					<tr>
						<td style="color:006905"><b>Full Name:</b></td></br>
						<td><input name="fullname" type="text" placeholder="Full Name" style="border-radius: 5px; background-color:#d3ffb5" required/></td>
					</tr>
					<tr>
						<td style="color:006905"><b>Gender:</b></td>
						<td style="color:006905">
							<input type="radio" name="gender" value="male" checked required/>Male
							<input type="radio" name="gender" value="female" required/>Female
						</td>
					</tr>
					<tr>
						<td style="color:006905"><b>Username:</b></td>
						<td><input type="text" name="username" placeholder="Username" style="border-radius: 5px; background-color:#d3ffb5" required/> </td>
					</tr>
					<tr>
						<td style="color:006905"><b>Password:</b></td>
						<td><input type="password" name="password" placeholder="Password" style="border-radius: 5px; background-color:#d3ffb5" required/></td>
					</tr>
					<tr>
						<td style="color:006905"><b>Confirm Password:</b></td>
						<td><input type="password" name="cpassword" placeholder="Confirm Password" style="border-radius: 5px; background-color:#d3ffb5" required/></td>
					</tr>
					<tr>
						<td style="color: 006905"><b>Email Address:</b></td>
						<td><input type="text" name="email" placeholder="Email Address" style="border-radius: 5px; background-color:#d3ffb5" required/> </td>
					</tr>
					<tr>
						<td style="color:006905"><b>User Type:</b></td>
						<td style="color:006905">
							<input type="radio" name="user_type" value="Admin/Teacher" checked required/>Admin/Teacher
							<input type="radio" name="user_type" value="Student" required/>Student
						</td>
					</tr>
					<tr>
						<td colspan=4><hr></td>
					</tr>
					
					<tr align="right">
						<td colspan=4 style="padding: 10px">
							<a class="btn" href="Login_Page.php" style="text-decoration: none;">Back</a>
							<button name="submit" type="submit" class="btn">Sign Up</button>
						</td>
					</tr>
				</table>
			</div>
		</form><?php
		
		if(isset($_POST['submit']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
			$fullname=$_POST['fullname'];
			$gender=$_POST['gender'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$email=$_POST['email'];
			$user_type=$_POST['user_type'];
			
			if($password==$cpassword)
			{
				$query="SELECT * FROM userinfotable WHERE username LIKE('$username')";
				$query_run=mysqli_query($connect,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					//there is already an existing same username
					echo '<script type="text/javascript"> alert("User already exists...try another username") </script>';
				}
				else
				{
					$query="INSERT INTO userinfotable VALUES ('','$username','$fullname','$password','$gender','$email','$user_type')";
					$query_=mysqli_query($connect,$query);
					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered...Redirecting to the login page.") </script>';
						//header('location:Login_Page.php');
					}
					else
					{
						echo '<script type="text/javascript"> alert("ERROR!") </script>';
					}
				}	
			}
			else
			{
				echo '<script type="text/javascript"> alert("Password does not match!") </script>';
			}
		}?>
	</body>
</html>