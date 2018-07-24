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
	
	$studno=$_REQUEST['studno'];
	$_SESSION['studno']=$studno;
	
	$Course_Code=$_REQUEST['Course_Code'];
	$_SESSION['Course_Code']=$Course_Code;
	
	$query="SELECT * FROM students  WHERE studno = '$studno'";
	$result = mysqli_query($connect,$query) or die (mysqli_error($connect));

	if (false === $result)
	{
		echo mysqli_error();
	}
	elseif(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{	
			$section=$row['section'];
			$_SESSION['section']=$section;
		}
	}

	$chk=$_REQUEST['chk'];
	$ctr_exer=$_REQUEST['ctr_exer'];
	$_SESSION['ctr_exer']=$ctr_exer;
	$ctr_exer=$_SESSION['ctr_exer'];

	$ctr_quiz=$_REQUEST['ctr_quiz'];
	$_SESSION['ctr_quiz']=$ctr_quiz;
	$ctr_quiz=$_SESSION['ctr_quiz'];
				
?>
<!DOCTYPE html>
<html>
<head>
<title>DLSL Grading System</title>
<link rel="stylesheet" href="css/new_with_scroll.css">
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
		  <li><a href="Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>">Section</a></li><?php

		  if($chk==0)
		  {
			?><li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Student</a></li>
			<li><a href="Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0">Grading</a></li><?php
		  }
		  else
		  {
		  	?><li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Student</a></li>
		  	<li><a href="Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Grading</a></li><?php
		  }

		  ?><li><a href="Midterm_Grading_Sheet.php">Midterm Grading</a></li>
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
		<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>">Sections</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0">Student</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--	<form action="Home_Page.php" method="POST">
				<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
			</form>
		<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>
<div class="pageContent">
	<form action="Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1
	&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>" method="POST">
		<table width=45% style='margin-left:480px;margin-top:50px'>
			<tr>
			<?php $query="SELECT * FROM students WHERE studno='$_SESSION[studno]'";
			$query_run=mysqli_query($connect,$query);
			
			if(mysqli_num_rows($query_run)>0)
			{
				while($row=mysqli_fetch_array($query_run))
				{
					echo"<td><b>Student No.</b></td><td><input type='text' readonly name='studno' style='width:99%' value='" . $_SESSION['studno'] . "'/></td>";
				}
			}
			
				echo "<td><b>Course Code</b></td>";
				echo "<td colspan=2><input type='text' readonly name='studno' style='width:99%' value='" . $_SESSION['Course_Code'] . "'/></td>";
			//}
			?>
			</tr>
			<tr>	
				<td colspan=4><center><b>Midterm</b></center></td>
			</tr>
			<tr>
				<td colspan=2><b>Attendance:</b></td>
				<td colspan=2><input type="number" min="0" max="100" name="mattd" style="width:99%"/></td>
			</tr>
			<tr>
				<td colspan=2><b>Values and Behavior:</b></td>
				<td colspan=2><input type="number" min="0" max="100" name="mvb" style="width:99%" /></td>
			</tr>
			<tr>
				<td colspan=4><center><b>Exercise </b></center></td>
			</tr>
			<tr><?php
				
				if(!$query_run)
					{									
						echo '<script type=text/javascript> alert("ERROR!")</script>';
					}
			?></tr><?php
			

			if($chk==0)
			{
			
			?><tr><?php

				if(!isset($_POST['add_exer']))
				{
					if($ctr_exer>1)
					{
						if($query_run)
						{
							for($i=0;$i<$ctr_exer-1;$i++)
							{
								$excercisNo = $i + 1;
								echo "<td colspan=2><b>Exercise " . $excercisNo . ":</b></td>";
								echo "<td colspan=2><input type='number' min='50' max='100' name='exer$i' style='width:99%' /></td>";
								echo "</tr>";
							}							
						}
						else
						{
							echo '<script type=text/javascript> alert("ERROR!")</script>';
						}
					}
					else
					{
						echo " ";
					}
				}				
			?></tr>
			<tr>
				<td colspan=4>
					<input type="button" class='button' value="Add Exercise" name="add_exer" style="width:25%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer+1?>&ctr_quiz=<?php echo $ctr_quiz?>'"/>
					<?php
					if(!isset($_POST['add_exer']))
						{
							if($ctr_exer>1)
							{
							?>
							<input type="button" class='button' value="Remove Exercise" name="remove_exer" style="width:25%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer-1?>&ctr_quiz=<?php echo $ctr_quiz?>'"/>
							<?php }
						}?>
				</td>
			</tr><?php
			}
			else
			{
				for($i=0;$i<$ctr_exer-1;$i++)
				{
					$excercisNo = $i + 1;
					echo "<td colspan=2><b>Exercise " . $excercisNo . ":</b></td>";
					echo "<td colspan=2><input type='number' min='50' max='100' name='exer$i' style='width:99%' /></td>";
					echo "</tr>";
				}

			}?>
			<tr>
				<td colspan=4><center><b>Quiz</b></center></td>
			</tr>
			<tr><?php
				
				if(!$query_run)
					{									
						echo '<script type=text/javascript> alert("ERROR!")</script>';
					}
			?></tr><?php
			

			if($chk==0)
			{
			
			?><tr><?php

				if(!isset($_POST['add_quiz']))
				{
					if($ctr_quiz>1)
					{
						if($query_run)
						{
							for($i=0;$i<$ctr_quiz-1;$i++)
							{
								$quizNo = $i + 1;
								echo "<td colspan=2><b>Quiz " . $quizNo . ":</b></td>";
								echo "<td colspan=2><input type='number' min='50' max='100' name='quiz$i' style='width:99%' /></td>";
								echo "</tr>";
							}							
						}
						else
						{
							echo '<script type=text/javascript> alert("ERROR!")</script>';
						}
					}
					else
					{
						echo " ";
					}
				}				
			?></tr>
			<tr>
				<td colspan=4>
					<input type="button" class='button' value="Add Quiz" name="add_quiz" style="width:25%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz+1?>'"/>
					<?php
					if(!isset($_POST['add_quiz']))
						{
							if($ctr_quiz>1)
							{
							?>
							<input type="button" class='button' value="Remove Quiz" name="remove_quiz" style="width:25%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz-1?>'"/>
							<?php }
						}?>
				</td>
			</tr><?php
			}
			else
			{
				for($i=0;$i<$ctr_quiz-1;$i++)
				{
					$quizNo = $i + 1;
					echo "<td colspan=2><b>Quiz " . $quizNo . ":</b></td>";
					echo "<td colspan=2><input type='number' min='50' max='100' name='quiz$i' style='width:99%' /></td>";
					echo "</tr>";
				}

			}?>
			<tr>
				<td colspan=2><b>Major Exam:</b></td>
				<td colspan=2><input type="number" min="0" max="100" name="mexam" style="width:99%" /></td>
			</tr>
			<tr>
				<td></td><td></td>
					<input type="hidden" name="Course_Code" value="<?php echo $_SESSION['Course_Code']?>"/><?php
						
						/*if ($chk==0) 
						{?>
							<input type="submit" value="Submit" onclick="location='Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'" />
							<input type="button" value="Cancel" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
						}
						else*/
						if(($ctr_exer>1) && ($ctr_quiz>1))
						{?>
							<td colspan=2 align=right><input type="submit" value="Submit" class='button' onclick="location='Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'" /><?php
						}?>
						<input type="button" value="Cancel" class='button' onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/></td>
			</tr></br>
		</table>
	</form>
	<?php 
		/*echo "<pre>";
	print_r($ctr_exer);
	print_r($ctr_quiz);*/
	?>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>