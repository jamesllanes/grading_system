<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style2.css">
<style>	
img {
    width: 70px;
    height: 70px;
    display: inline-block;
    vertical-align: middle;
}
	
img {
    width: 80px;
    height: 80px;
    display: inline-block;
    vertical-align: middle;
}
.mabini {
	background-size: 115% 100%;
	background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%), url(mabini_building.jpg); background-position: center-bottom;
	}
</style>
</head>
<body style="background-color:#BDC3C7">
	<form action="Login_Page.php" method="POST"><br><br><br><br>
		<table align=center bgcolor="white" bordercolor="white" style="border-radius: 10px;">
			<tr>
				<td colspan="2">
					<div class=container align=center>
						<img src="images/DLSL_Official_Seal.png">
						<div class=content>
							<h3><a style="font-size:25px; color: black;">DE LA SALLE LIPA</a><br>
							<a style="font-size:18px; color: black">College Grading System</a></h3>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class=loginform>
					<tr>
						<td style="color:006905"><br><b>Username:</b></td>
						<td><br><input name="username" type="text" name="username" placeholder="Enter Username" style="border-radius: 5px; background-color:#d3ffb5" required/> </td>
					</tr>
					<tr>
						<td style="color:006905"><b>Password:</b></td>
						<td><input name="password" type="password" name="password" placeholder="Enter Password" style="border-radius: 5px; background-color:#d3ffb5" required/></td>
					</tr>
					
					<tr align="right">
						<td colspan=2 style="padding: 10px">
							<button name="login" type="submit" class="btn">Log in</button>
						</td>
					</tr>			
					<tr>
						<td colspan=2 align=center>
							<br><hr>
							<a class="button" href="Register.php" style="text-decoration: none;">Register</a>
						</td>
					</tr>
				</td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="SELECT * FROM userinfotable WHERE username='$username' AND password='$password'";
			$query_run=mysqli_query($connect,$query);

			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$_SESSION['username']=$username;
				header('location:Home_Page.php');
			}
			else
			{
				//invalid
				echo '<script type="text/javascript"> alert("Invalid Username or Password!") </script>';
			}
		}
		else
		{
			echo '<script type="text/javascript"> alert("Logging Out!") </script>';
		}
	?>
</body>
</html>