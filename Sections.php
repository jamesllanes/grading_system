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
	
	$Course_Code=$_REQUEST['Course_Code'];
	$_SESSION['Course_Code']=$Course_Code;
?>
<!DOCTYPE html>
<html>
<head>
<title>DLSL Grading System</title>
<link rel="stylesheet" href="css/new_without_scroll.css">
</head>
<body>
<!--<div class="blended_grid">-->
<div class="fixed_top">
	<div class="pageHeader">
	<img src="images/DLSL_Official_Seal.png" class="dlslimg">
		<h3><a>DE LA SALLE LIPA<br>Grading System</a></h3>
	</div>
	<div class="pageHeaderSub">
		<ul class="breadcrumb">
		  <li><a href="Home_Page.php">Home</a></li>
		  <li><a href="Subjects.php">Subject Load</a></li>
		  <li><a href="Sections.php">Section</a></li>
		</ul>
	</div>
</div>	
	<div class="pageBarLeft">
		<div class="pageBarLeftTop">
			<h4 class="w3-bar-item">
				<b><center>
				<?php
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
		<a class="w3-bar-item w3-button w3-hover-black" href="Home_Page.php">Home</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Subjects.php">Back</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--<form action="Home_Page.php" method="POST">
		<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
		</form>-->
		</div>
	</div>
</div>

<div class="pageContent"><?php
	
	$query="SELECT * FROM section, subjects";
	$query_run = mysqli_query($connect,$query)or die (mysqli_error($connect));

	if (false === $query_run) {
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($query_run)>0)
	{
		echo "<table border=1 width=35% style='margin-left:520px;margin-top:50px'>";
		echo "<tr><th colspan=5>List of Sections</th></tr>";
		echo "<th>No.</th>";
		echo "<th>Section</th>";
		echo "<th>Number of Students</th>";
		echo "<th></th>";

		$i=1;
		while($i<=3)
		{
			$row=mysqli_fetch_array($query_run);
			//if ($_SESSION['section_name'] == $row['section_name']) && ($_SESSION['Course_Code'] == $row['Course_Code']))
			$section=$row['section_name'];
			$_SESSION['section_name']=$section;
			
			$Course_Code=$_REQUEST['Course_Code'];
			$_SESSION['Course_Code']=$Course_Code;
			
			echo "<tr class='row'>";
			echo "<td>".$row['section_no']."</td>";
			echo "<td><a href='Students.php?Course_Code=". $_SESSION['Course_Code'] ."&section=". $_SESSION['section_name'] ."&chk=0'>" . $row['section_name'] ."</a></td>";
			echo "<td width=35%>". $row['num_of_students'] . "</td>";
			echo "<td width=20%><a href='Students.php?Course_Code=". $_SESSION['Course_Code'] ."&section=". $_SESSION['section_name'] ."&chk=0'><button class='button'><img src='images/green_eye.jpg' class='editimg' style='border-radius:50%; overflow:hidden;''> View</button></a></td>";
			echo "</tr>";
			$i++;
			
		}
		echo "</table>";
	}
	else
		echo "No records found.";
	?>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>