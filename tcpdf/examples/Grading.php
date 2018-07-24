<?php
	session_start();
	require 'dbconfig/config.php';
	
	if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		$_SESSION=array();?>
		<meta http-equiv="refresh" content=".000001;url=Login_Page.php"/><?php
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/subjects2.css">
</head>
<body>
<!--<div class="blended_grid">
<div class="fixed_top">-->
	<div class="pageHeader">
	<img src="images/DLSL_Official_Seal.png">
		<h3><a>DE LA SALLE LIPA<br>Grading System</a></h3>
	</div>
	<div class="pageHeaderSub">
		<ul class="breadcrumb">
		  <li><a href="Home_Page.php">Home</a></li>
		  <li><a href="Subjects.php">Subject Load</a></li>
		  <li><a href="Sections.php">Section</a></li>
		</ul>
	</div>
	
	<div class="pageBarLeft">
		<div class="pageBarLeftTop">
			<h4 class="w3-bar-item">
				<b><center><?php 
				
				$query="SELECT * FROM userinfotable WHERE username='$_SESSION[username]'";
				$query_run=mysqli_query($connect,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					while($row=mysqli_fetch_array($query_run))
					{
						echo $row['fullname'];
						echo "<br><h5>".$row['email']."<h5>";
					}
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
				}?>
			
				</center></b>
			</h4>
		</div>
		<div class="pageBarLeftBottom">
		<a class="w3-bar-item w3-button w3-hover-black" href="Subjects.php">Subjects</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php">Sections</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--	<form action="Home_Page.php" method="POST">
				<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
			</form>
		<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>

<div class="pageContent">
	<center>	
		<table border=1>
			<th colspan=3>Grading</th><br>
				<tr>
					<td><input type="button" value="Midterm Grading" onclick="location='Midterms_Grading_Sheet.php'"/></td>
					<td><input type="button" value="Final Grading" onclick="location='Finals_Grading_Sheet.php'"/></td>
					<td><input type="button" value="Cancel" onclick="location='Sections.php'"/></td>
				<tr>
		</table>
	</center>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>