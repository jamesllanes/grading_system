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
<link rel="stylesheet" href="css/without_scroll.css">
</head>
<body>
<!--<div class="blended_grid">-->
<div class="fixed_top">
	<div class="pageHeader">
	<img src="images/DLSL_Official_Seal.png">
		<h3><a>DE LA SALLE LIPA<br>Grading System</a></h3>
	</div>
	<div class="pageHeaderSub">
		<ul class="breadcrumb">
		  <li><a href="Home_Page.php">Home</a></li>
		  <li><a href="Subjects.php">Subject Load</a></li>
		  <li><a href="Sections.php">Section</a></li>
		  <li><a href="Students.php">Student</a></li>
		</ul>
	</div>
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
						echo "<br>";
						echo "<h5>".$row['email']."<h5>";
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

<div class="pageContent"><?php
	$section=$_REQUEST['section'];
	$query="SELECT * FROM students  WHERE section = '$section'";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		echo "<table border=1 width=60% style='margin-left:380px;margin-top:50px'>";
		echo "<tr><th colspan=7>List of Students<br></th></tr>";
		echo "<th>Student Number</th>";
		echo "<th>Last Name</th>";
		echo "<th>First Name</th>";
		echo "<th>Middle Name</th>";
		echo "<th>Gender</th>";
		echo "<th>Program</th>";
		echo "<th>Section</th>";
		

		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><center><a href='Grading.php?studno=". $row['studno'] . "'>" . $row['studno'] . "</a></center></td>";
			echo "<td>". $row['lastname'] . "</td>";
			echo "<td>". $row['firstname'] . "</td>";
			echo "<td>". $row['middlename'] . "</td>";
			echo "<td>". $row['gender'] . "</td>";
			echo "<td>". $row['program'] . "</td>";
			echo "<td>". $row['section'] . "</td>";
			echo "</tr>";
			
		}
		echo "</table>";
	}
	else
		echo "No records found.";?>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>