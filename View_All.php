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
	
	$section=$_REQUEST['section'];
	$_SESSION['section']=$section;
	$section_name=$_SESSION['section'];

	$chk=$_REQUEST['chk'];
	if($chk==1)
	{
		$ctr_exer=$_REQUEST['ctr_exer'];
		$_SESSION['ctr_exer']=$ctr_exer;
		$ctr_exer=$_SESSION['ctr_exer'];

		$ctr_quiz=$_REQUEST['ctr_quiz'];
		$_SESSION['ctr_quiz']=$ctr_quiz;
		$ctr_quiz=$_SESSION['ctr_quiz'];
	}
	
	$Course_Code=$_REQUEST['Course_Code'];
	$_SESSION['Course_Code']=$Course_Code;
	$Course_Code=$_SESSION['Course_Code'];
?>
<!DOCTYPE html>
<html>
<head>
<title>DLSL Grading System</title>
<link rel="stylesheet" href="css/new_view_all.css">
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
			<li><a href="Sections.php?Course_Code=<?php echo $Course_Code ?>&section=<?php echo $section_name ?>">Section</a></li>
			<li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>">Student</a></li>
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
					?>
					<meta http-equiv="refresh" content=".000001;url=Login_Page.php"/><?php
				}?>
			
				</center></b>
			</h4>
		</div>
		<div class="pageBarLeftBottom">
		<a class="w3-bar-item w3-button w3-hover-black" href="Subjects.php">Subjects</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="View_All.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2A&chk=1">IT2A</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="View_All.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2B&chk=1">IT2B</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="View_All.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2C&chk=1">IT2C</a>
			<?php
	$query="SELECT * FROM grades WHERE section_name = '$section_name' AND Course_Code = '$Course_Code'";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		?><a class="w3-bar-item w3-button w3-hover-black" href="tcpdf/examples/sampleedit.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $section_name?>&chk=1">PDF Version</a><?php
	}
	?>
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0">Back</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--	<form action="Home_Page.php" method="POST">
				<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
			</form>
		<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>

<div class="pageContent">
	<?php
	$query="SELECT * FROM grades WHERE section_name = '$section_name' AND Course_Code = '$Course_Code'";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		echo "<table border=1 width=60% style='margin-left:230px;margin-top:90px'>";
		echo "<tr><td><b>Course Code</b></td><td>".$Course_Code."</td>";
		echo "<td><b>Section</b></td><td>".$section_name."</td></tr>";
		echo "<tr><th colspan=25>List of Students<br></th></tr>";		
		echo "<th>No.</th>";
		echo "<th>Student Number</th>";
		echo "<th>Midterm Attendance</th>";
		echo "<th>Final Attendance</th>";
		echo "<th>Midterm Values & Behavior</th>";
		echo "<th>Final Values & Behavior</th>";
		echo "<th>Midterm Exercises</th>";
		echo "<th>Final Exercises</th>";
		echo "<th>Midterm Exercises Average</th>";
		echo "<th>Final Exercises Average</th>";
		echo "<th>Midterm Class Standing</th>";
		echo "<th>Final Class Standing</th>";
		echo "<th>Midterm Quizzes</th>";
		echo "<th>Final Quizzes</th>";
		echo "<th>Final Exercises Average</th>";
		echo "<th>Final Quizzes Average</th>";
		echo "<th>Midterm Exam</th>";
		echo "<th>Final Exam</th>";
		echo "<th>ME %</th>";
		echo "<th>FE %</th>";
		echo "<th>MG</th>";
		echo "<th>FG</th>";
		echo "<th>FCG</th>";
		echo "<th>GPE</th>";
		echo "<th>Remarks</th>";
		
		$i=1;
		while($row=mysqli_fetch_array($result))
		{	
			$studno=$row['studno'];
			$_SESSION['studno']=$studno;
			
			echo "<tr class='row'>";
			echo "<td><center>".$i++."</td>";
			echo "<td><center>". $row['studno'] . "</center></td>";
			echo "<td><center>". $row['mattd'] . "</center></td>";
			echo "<td><center>". $row['fattd'] . "</center></td>";
			echo "<td><center>". $row['mvb'] . "</center></td>";
			echo "<td><center>". $row['fvb'] . "</center></td>";
			echo "<td><center>". $row['mexercises'] . "</center></td>";
			echo "<td><center>". $row['fexercises'] . "</center></td>";
			echo "<td><center>". $row['mxave'] . "</center></td>";
			echo "<td><center>". $row['fxave'] . "</center></td>";
			echo "<td><center>". $row['mcs'] . "</center></td>";
			echo "<td><center>". $row['fcs'] . "</center></td>";
			echo "<td><center>". $row['mquizzes'] . "</center></td>";
			echo "<td><center>". $row['fquizzes'] . "</center></td>";
			echo "<td><center>". $row['mqave'] . "</center></td>";
			echo "<td><center>". $row['fqave'] . "</center></td>";
			echo "<td><center>". $row['mexam'] . "</center></td>";
			echo "<td><center>". $row['fexam'] . "</center></td>";
			echo "<td><center>". $row['mexamp'] . "</center></td>";
			echo "<td><center>". $row['fexamp'] . "</center></td>";
			echo "<td><center>". $row['mg'] . "</center></td>";
			echo "<td><center>". $row['fg'] . "</center></td>";
			echo "<td><center>". $row['fcg'] . "</center></td>";
			echo "<td><center>". $row['GPE'] . "</center></td>";
			echo "<td><center>". $row['remarks'] . "</center></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "<table class='tbl2' width=1135px; style='margin-left:230px;margin-top:90px'>";
		echo "<tr><td>No records found.</td></tr></table>";
	}
	?>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>