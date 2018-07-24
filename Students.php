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
	
	/*$query="SELECT * FROM students  WHERE section = '$section'";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{	
			$section=$row['section_name'];
			$_SESSION['section']=$section;
		}
	}*/
			$Course_Code=$_REQUEST['Course_Code'];
			$_SESSION['Course_Code']=$Course_Code;
			$Course_Code=$_SESSION['Course_Code'];
?>
<!DOCTYPE html>
<html>
<head>
<title>DLSL Grading System</title>
<link rel="stylesheet" href="css/students_div.css">
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
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2A&chk=0">IT2A</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2B&chk=0">IT2B</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=IT2C&chk=0">IT2C</a>
		<a href="tcpdf/examples/class_list.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $section_name?>&chk=1"> Class List PDF</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="View_All.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1">View Class Grade</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--	<form action="Home_Page.php" method="POST">
				<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
			</form>
		<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>

<div class="pageContent"><?php
	$_SESSION['section'];
	$query="SELECT * FROM students WHERE section = '$section' ORDER BY lastname ASC";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		echo "<table border=1 width=60% style='margin-left:380px;margin-top:50px'>";
		echo "<tr><th colspan=7>List of Students<br></th></tr>";
		echo "<th>No.</th>";
		echo "<th>Student Number</th>";
		echo "<th>Last Name</th>";
		echo "<th>First Name</th>";
		echo "<th>Gender</th>";
		echo "<th>Program</th>";
		echo "<th></th>";
		
		$i=1;
		while($row=mysqli_fetch_array($result))
		{	
			$studno=$row['studno'];
			$_SESSION['studno']=$studno;
			
			echo "<tr class='row'>";
			echo "<td>".$i++."</td>";
			/*if($chk==0)
			{
				echo "<td><b><a href='Grading.php?Course_Code=". $_SESSION['Course_Code'] ."&studno=" .$_SESSION['studno']. "&chk=0'>". $row['studno'] . "</a></b></td>";
			}
			else
			{
				echo "<td><b><a href='Grading.php?Course_Code=". $_SESSION['Course_Code'] ."&studno=" .$_SESSION['studno']. "&chk=1&ctr_exer=". $ctr_exer ."&ctr_quiz=". $ctr_quiz ."'>". $row['studno'] . "</a></b></td>";	
			}*/
			echo "<td width=17%>". $row['studno']."</td>";
			echo "<td width=17%>". $row['lastname'] . "</td>";
			echo "<td width=25%>". $row['firstname'] . "</td>";
			echo "<td>". $row['gender'] . "</td>";
			echo "<td>". $row['program'] . "</td>";
			if($chk==0)
			{?>
				<td><input type="button" class='button' name="select_student" value="Select" style="width:100%" onclick="location='Grading.php?Course_Code=<?php echo  $_SESSION['Course_Code']; ?>&studno=<?php echo $_SESSION['studno']; ?>&chk=0'"></td><?php
			}
			else
			{?>
				
				<td><input type="button" class='button' name="select_student" value="Select" style="width:100%" onclick="location='Grading.php?Course_Code=<?php echo  $_SESSION['Course_Code']; ?>&studno=<?php echo $_SESSION['studno']; ?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"></td><?php	
			}
			//echo "<td>". $row['section'] . "</td>";
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