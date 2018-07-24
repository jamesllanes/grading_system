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
	
	$Subject_Post=$_REQUEST['Course_Code'];
	$_SESSION['Course_Code']=$Subject_Post;
	
	$chk=$_REQUEST['chk'];
	
	$ctr_exer=$_REQUEST['ctr_exer'];
	$_SESSION['ctr_exer']=$ctr_exer;
	$ctr_exer=$_SESSION['ctr_exer'];
	
	$ctr_quiz=$_REQUEST['ctr_quiz'];
	$_SESSION['ctr_quiz']=$ctr_quiz;
	$ctr_quiz=$_SESSION['ctr_quiz'];

	/*$chk=$_REQUEST['chk'];
	if($chk==1)
	{
		$ctr_exer=$_REQUEST['ctr_exer'];
		$_SESSION['ctr_exer']=$ctr_exer;
		$ctr_exer=$_SESSION['ctr_exer'];

		$ctr_quiz=$_REQUEST['ctr_quiz'];
		$_SESSION['ctr_quiz']=$ctr_quiz;
		$ctr_quiz=$_SESSION['ctr_quiz'];
	}*/
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
		  <li><a href="Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>">Section</a></li>
		  <li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Student</a></li>
		  <li><a href="Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Grading</a></li>
		  <li><a href="Midterm_Grading_Sheet.php">Midterm Grading</a></li>
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
			<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Student</a>
			<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		<!--<form action="Home_Page.php" method="POST">
		<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
	</form>
		<!--<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>
</div>
<?php //insert of grades ?>
<div class="pageContent">
	<form action="Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1
	&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>" method="POST">
		<table width=46% style='margin-left:477px;margin-top:50px'>
			<tr>
			<?php
			$mattd=$_POST['mattd'];
			$mvb=$_POST['mvb'];
			$mexam=$_POST['mexam'];
			
			$mexamp=($mexam/100)*50+50;
			
			$query="SELECT * FROM students WHERE studno='$_SESSION[studno]'";
			$query_run=mysqli_query($connect,$query);
			
			if(mysqli_num_rows($query_run)>0)
			{
				while($row=mysqli_fetch_array($query_run))
				{
					echo"<td><b>Student No.</b></td><td><input type='text' readonly name='studno' style='width:99%' value='" . $_SESSION['studno'] . "'/></td>";
				}
			}
				echo "<td><b>Course Code</b></td>";
				echo "<td><input type='text' readonly name='Course_Code' style='width:99%' value='" . $_SESSION['Course_Code'] . "'/></td>";
			?>
			</tr>
			<tr>	
				<td colspan=4><center><b>Midterm</b></center></td>
			</tr>
			<tr>
				<td colspan=2><b>Attendance:</b></td>
				<td colspan=2><?php	
					if($mattd==NULL || $mattd<50 || $mattd>100)
					{
						echo "<input type='number' min='0' max='100' name='mattd' style='width:94.8%' value='" . $mattd .  "'/>";
						echo "<font color=red>*";
					}					
					else
					{
						echo "<input type='text' readonly name='mattd' style='width:97.8%' value='" . $mattd .  "'/>";
						echo "<input type='hidden' name='mattd' style='width:97.8%' value='" . $mattd .  "'/>";						
					}
				?></td>
			</tr>
			<tr>
				<td colspan=2><b>Values and Behavior:</b></td>
				<td colspan=2><?php
					if($mvb==NULL || $mvb<50 || $mvb>100)
					{
						echo "<input type='number' min='0' max='100' name='mvb' style='width:94.8%' value='" . $mvb .  "'/>";
						echo "<font color=red>*";
						$mvb=NULL;
					}					
					else
					{
						echo "<input type='text' readonly name='mvb' style='width:97.8%' value='" . $mvb .  "'/>";
						echo "<input type='hidden' readonly name='mvb' style='width:97.8%' value='" . $mvb .  "'/>";						
					}
				?></td>
			</tr>
			<tr>
				<td colspan=4><center><b>Exercise</b></center></td>
			</tr>
				<?php 
				$checker=0;
				$mx = array();
				$error = 0;
				$mxtotal=0;
				for($i=0;$i<$ctr_exer-1;$i++)
				{
					$mx[$i]=$_POST["exer$i"];
					$mxtotal=$mxtotal+$mx[$i];
					$mxave=$mxtotal/($ctr_exer-1);
					$mcs=($mxave*0.80)+($mattd*0.10)+($mvb*0.10);
					$exerciseNo = $i + 1;
					echo "<tr><td colspan=2><b>Exercise " . $exerciseNo . "</b></td>";
					if($mx[$i] == NULL || $mx[$i]<50 || $mx[$i]>100)
					{
						echo "<td colspan=2><input type='number' min='0' max='100' name='exer$i' style='width:94.8%' value='" . $mx[$i] .  "'/>";
						echo "<font color=red>*</td>";
						$error = $error + 1;
					}
					else
					{
						echo "<td colspan=2><input type='text' readonly name='". $mx[$i] ."' style='width:97.8%' value='" . $mx[$i] .  "'/></td></tr>";
						echo "<input type='hidden' name='exer$i' style='width:97.8%' value='" . $mx[$i] .  "'/>";
						$a=1;
						
						$checker=$checker+$a;
						echo "<input type='hidden' name='checker' style='width:97.8%' value='" . $checker .  "'/>";
					}
				}
				
				$getImplodeGrades = implode(",",$mx);
				if($error < 1){
					$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql="UPDATE exercises SET mexercises ='".$getImplodeGrades."'";
									$query=mysqli_query($connect,$sql);
								}
							}
						}
						else
						{
							$sql1="INSERT INTO exercises (studno,mexercises,fexercises,term,course_code) VALUES ('$_SESSION[studno]','".$getImplodeGrades."','','','$_SESSION[Course_Code]')";
							$query=mysqli_query($connect,$sql1);
						}
				}
					
				//}
				/*for($i=1;$i<=$ctr_exer;$i++)
				{
					$sql1="update exercises set Exercise$i = ".$_POST["exer$i"]." where studno = '$_SESSION[studno]'";
					$query=mysqli_query($connect,$sql1);
				}*/
				?>
			<tr>
				<?php
					$ctr=$ctr_exer-1;
					if($checker==$ctr)
					{
						echo "<td colspan=2><b>Average:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='mxave' style='width:97.8%' value='" . round($mxave,2) .  "'/>";
						echo "<input type='hidden' name='mxave' style='width:97.8%' value='" . round($mxave,2) .  "'/>";
					}
					else
					{
						$mxave=NULL;
					}
				?>
				</td>
			</tr>
			<tr>
				<?php
					if(($mattd && $mvb && $mxave)!=NULL)
					{
						echo "<td colspan=2><b>Class Standing:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='mcs' style='width:97.8%' value='" . round($mcs,2) .  "'/></td>";
					}
					else
						$mcs=NULL;
				?>
			</tr>
			<tr>
				<td colspan=4><center><b>Quiz</b></center></td>
			</tr>
			<?php 
				$checker1=0;
				$mq = array();
				$error = 0;
				$mqtotal=0;
				for($i=0;$i<$ctr_quiz-1;$i++)
				{
					$mq[$i]=$_POST["quiz$i"];
					$mqtotal=$mqtotal+$mq[$i];
					$mqave=$mqtotal/($ctr_quiz-1);
					$quizNo = $i + 1;
					echo "<tr><td colspan=2><b>Quiz " . $quizNo . "</b></td>";
					if($mq[$i] == NULL || $mq[$i]<50 || $mq[$i]>100)
					{
						echo "<td colspan=2><input type='number' min='0' max='100' name='quiz$i' style='width:94.8%' value='" . $mq[$i] .  "'/>";
						echo "<font color=red>*</td>";
						$error = $error + 1;
					}
					else
					{
						echo "<td colspan=2><input type='text' readonly name='". $mq[$i] ."' style='width:97.8%' value='" . $mq[$i] .  "'/></td></tr>";
						echo "<input type='hidden' name='quiz$i' style='width:97.8%' value='" . $mq[$i] .  "'/>";
						$a=1;
						
						$checker1=$checker1+$a;
						echo "<input type='hidden' name='checker' style='width:97.8%' value='" . $checker1 .  "'/>";
					}
				}
				
				$getImplodeQuizGrades = implode(",",$mq);
				if($error < 1){
					$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql2="UPDATE quizzes SET mquizzes ='".$getImplodeQuizGrades."'";
									$query=mysqli_query($connect,$sql2);
								}
							}
						}
						else
						{
							$sql3="INSERT INTO quizzes (studno,mquizzes,fquizzes,term,course_code) VALUES ('$_SESSION[studno]','".$getImplodeQuizGrades."','','','$_SESSION[Course_Code]')";
							$query=mysqli_query($connect,$sql3);
						}
				}				
				//}
				/*for($i=1;$i<=$ctr_quiz;$i++)
				{
					$sql2="update quizzes set Quizzes$i = ".$_POST["quiz$i"]." where studno = '$_SESSION[studno]'";
					$query=mysqli_query($connect,$sql2);
				}*/
				?>
			<tr>
				<?php
					$ctr=$ctr_quiz-1;
					//echo "ctr";
					//echo $ctr;
					//echo $checker1;
					if($checker1==$ctr)
					{
						echo "<td colspan=2><b>Average:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='mqave' style='width:97.8%' value='" . round($mqave,2) .  "'/>";
						echo "<input type='hidden' name='mqave' style='width:97.8%' value='" . round($mqave,2) .  "'/>";
					}
					else
					{
						$mqave=NULL;
					}
				?>
				</td>
			</tr>	
			<tr>
				<td colspan=2><b>Major Exam:</b></td>
				<td colspan=2><?php
					if($mexam==NULL || $mexam<50 || $mexam>100)
					{
						echo "<input type='number' min='0' max='100' name='mexam' style='width:94.8%' value='" . $mexam .  "'/>";
						echo "<font color=red>*";
					}					
					else
					{
						echo "<input type='text' readonly name='mexam' style='width:97.8%' value='" . $mexam .  "'/>";	
						echo "<input type='hidden' name='mexam' style='width:97.8%' value='" . $mexam .  "'/>";
					}
				?></td>
			</tr>
			<tr>
				<?php 
					if($mexam!=NULL)
					{
						echo "<td colspan=2><b>Percentage(%):</b></td>";
						echo "<td colspan=2><input type='text' readonly name='mexamp' style='width:97.8%' value='" . round($mexamp,2).  "%'/></td>";
					}
					else
						$mexamp=NULL;
				?>
			</tr>	
			<tr>
				<?php 
					if(($mcs && $mqave && $mexamp)==NULL)
					$mg=NULL;
					else
					{
						$mg=($mcs/3)+($mqave/3)+($mexamp/3);
						echo "<td colspan=2><b>Midterm Grade:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='mg' style='width:97.8%' value='" . round($mg,2) .  "'/></td>";
					}
				?>
			</tr>
			<tr>
				<td colspan=4 align=right><?php
				/*NOTES: Wala pang course code at remarks*/
					//if(($mattd && $mvb && $mx1 && $mx2 && $mx3 && $mxave && $mcs && $mq1 && $mq2 && $mq3 && $mexam && $mexamp && $mg)!=NULL)
					$studno=$_SESSION["studno"];
					$mattd=$_POST["mattd"];
					$mvb=$_POST["mvb"];
					$mexam=$_POST["mexam"];
					$course_code=$_SESSION["Course_Code"];
					//$getImplodeGrades = implode(",",$mx);
					
					if(($mattd && $mvb && $mxave && $mcs && $mqave && $mexam && $mexamp && $mg)!=NULL)
					{
						$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql="UPDATE grades SET mattd= '".$mattd."',mvb= '".$mvb."', mexercises ='".$getImplodeGrades."', mxave= '".$mxave."', mcs= '".$mcs."', mquizzes= '".$getImplodeQuizGrades."', mqave= '".$mqave."', mexam= '".$mexam."', mexamp= '".$mexamp."', mg= '".$mg."' WHERE studno= $studno";
									
									$query=mysqli_query($connect,$sql);
									if($query)
									{
										echo '<script type="text/javascript"> alert("Grades Succesfully Updated.") </script>';
										?><input type="button" value="Back" class='button' onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
									}
									else
									{
										echo '<script type="text/javascript"> alert("ERROR!") </script>';
										?><input type="button" value="Cancel" class='button' onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
									}
								}
							}
						}
						else
						{
							$sql1="INSERT INTO grades (studno,section_name,Course_Code,mattd,fattd,mvb,fvb,mexercises,mxave,fxave,mcs,fcs,mquizzes,mqave,fqave,mexam,fexam,mexamp,fexamp,mg,fg,fcg,remarks) VALUES ('$_SESSION[studno]','$_SESSION[section]','$course_code','$_POST[mattd]','','$_POST[mvb]','','$getImplodeGrades','$mxave','','$mcs','','$getImplodeQuizGrades','$mqave','','$_POST[mexam]','','$mexamp','','$mg','','','')";
							
							$query=mysqli_query($connect,$sql1);
							if($query)
							{
								echo '<script type="text/javascript"> alert("Grades Succesfully Inserted.") </script>';
								?><input type="button" value="Back" class='button' onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
							}
							else
							{
								echo '<script type="text/javascript"> alert("ERROR!") </script>';
								?><input type="button" value="Cancel" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
							}

						}
					}
					else
					{
						?><input type="submit" value="Submit" class='button' onclick="location='Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/>
						<input type="button" value="Cancel" class='button' onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
					}
				?>
				</td>
			</tr></br>
		</table><?php
		//echo "<pre>";
	//($mattd);
	?>
	</form>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>