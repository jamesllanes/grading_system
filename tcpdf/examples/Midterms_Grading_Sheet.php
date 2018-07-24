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
		  <!--<li><a href="#">Class List</a></li>-->
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
			<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php">Section</a>		
			<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--<form action="Home_Page.php" method="POST">
		<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
	</form>
		<!--<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>
<div class="pageContent">
	<form action="Midterm_Insertion_of_Grades.php" method="POST">
		<table border=1 width=50% style='margin-left:240px;margin-top:50px'>
			<tr>	
				<td colspan=2><center><b>Midterm</b></center></td>
			</tr>
			<tr>
				<td><b>Attendance:</b></td>
				<td><input type="text" name="mattd" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Values and Behavior:</b></td>
				<td><input type="text" name="mvb" style="width:99%" /></td>
			</tr>
			<tr>
				<td colspan=2><center><b>Exercise</b></center></td>
			</tr>
			<tr>
				<td><b>Exercise 1:</b></td>
				<td><input type="text" name="mx1" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Exercise 2:</b></td>
				<td><input type="text" name="mx2" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Exercise 3:</b></td>
				<td><input type="text" name="mx3" style="width:99%"/></td>
			</tr>
			<tr>
				<td><b>Average:</b></td><td></td>
			</tr>
			<tr>
				<td><b>Class Standing:</b></td><td></td>	
			</tr>
			<tr>
				<td colspan=2><center><b>Quiz</b></center></td>
			</tr>
			<tr>
				<td><b>Quiz 1:</b></td>
				<td><input type="text" name="mq1" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Quiz 2:</b></td>
				<td><input type="text" name="mq2" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Quiz 3:</b></td>
				<td><input type="text" name="mq3" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Average:</b></td><td></td>
			</tr>	
			<tr>
				<td><b>Major Exam:</b></td>
				<td><input type="text" name="mexam" style="width:99%" /></td>
			</tr>
			<tr>
				<td><b>Percentage(%):</b></td><td></td>
			</tr>	
			<tr>
				<td><b>Midterm Grade:</b></td><td></td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<input type="submit" value="Submit"/>
					<input type="button" value="Cancel" onclick="location='Grading.php'"/>
				</td>
			</tr></br>
		</table>
	</form>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>