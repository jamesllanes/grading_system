
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
	
	$Subject_Post=$_POST['Course_Code'];
	$_SESSION['Course_Code']=$Subject_Post;
	
	$chk=$_REQUEST['chk'];
	
	$ctr_exer=$_REQUEST['ctr_exer'];
	$_SESSION['ctr_exer']=$ctr_exer;
	$ctr_exer=$_SESSION['ctr_exer'];
	
	$ctr_quiz=$_REQUEST['ctr_quiz'];
	$_SESSION['ctr_quiz']=$ctr_quiz;
	$ctr_quiz=$_SESSION['ctr_quiz'];
	
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
		  <li><a href="Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Grading</a></li>
		  <li><a href="Finals_Grading_Sheet.php">Final Grading</a></li>
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
			<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php">Section</a>		
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
	<form action="Final_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1
	&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>" method="POST">
		<table width=46% style='margin-left:477px;margin-top:50px'>
			<tr><?php
			
			$fattd=$_POST['fattd'];
			$fvb=$_POST['fvb'];
			$fexam=$_POST['fexam'];

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
				<td colspan=4><center><b>Finals</b></center></td>
			</tr>
			<tr>
				<td colspan=2><b>Attendance:</b></td>
				<td colspan=2><?php	
					if($fattd==NULL || $fattd<50 || $fattd>100)
					{
						echo "<input type='text' name='fattd' style='width:94.8%' value='" . $fattd .  "'/>";
						echo "<font color=red>*";
					}					
					else
					{
						echo "<input type='text' name='fattd' style='width:97.8%' value='" . $fattd .  "'/>";
						echo "<input type='hidden' name='fattd' style='width:97.8%' value='" . $fattd .  "'/>";						
					}
				?></td>
			</tr>
			<tr>
				<td colspan=2><b>Values and Behavior:</b></td>
				<td colspan=2><?php
					if($fvb==NULL || $fvb<50 || $fvb>100)
					{
						echo "<input type='text' name='fvb' style='width:94.8%' value='" . $fvb .  "'/>";
						echo "<font color=red>*";
						$fvb=NULL;
					}					
					else
					{
						echo "<input type='text' readonly name='fvb' style='width:97.8%' value='" . $fvb .  "'/>";
						echo "<input type='hidden' readonly name='fvb' style='width:97.8%' value='" . $fvb .  "'/>";						
					}
				?></td>
			</tr>
			<tr>
				<td colspan=4><center><b>Exercise </b></center></td>
			</tr>
				<?php 
				$checker=0;
				$fx = array();
				$error = 0;
				$fxtotal=0;
				for($i=0;$i<$ctr_exer-1;$i++)
				{
					$fx[$i]=$_POST["exer$i"];
					$fxtotal=$fxtotal+$fx[$i];
					$fxave=$fxtotal/($ctr_exer-1);
					$fcs=($fxave*0.80)+($fattd*0.10)+($fvb*0.10);
					$exerciseNo = $i + 1;
					echo "<tr><td colspan=2><b>Exercise " . $exerciseNo . "</b></td>";
					if($fx[$i] == NULL || $fx[$i]<50 || $fx[$i]>100)
					{
						echo "<td colspan=2><input type='text' name='exer$i' style='width:94.8%' value='" . $fx[$i] .  "'/>";
						echo "<font color=red>*</td>";
						$error = $error + 1;
					}
					else
					{
						echo "<td colspan=2><input type='text' readonly name='". $fx[$i] ."' style='width:97.8%' value='" . $fx[$i] .  "'/></td></tr>";
						echo "<input type='hidden' name='exer$i' style='width:97.8%' value='" . $fx[$i] .  "'/>";
						$a=1;
						
						$checker=$checker+$a;
						echo "<input type='hidden' name='checker' style='width:97.8%' value='" . $checker .  "'/>";
					}
				}
				
				$getImplodeGrades = implode(",",$fx);
				if($error < 1){
					$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql="UPDATE exercises SET fexercises ='".$getImplodeGrades."'";
									$query=mysqli_query($connect,$sql);
								}
							}
						}
						else
						{
							$sql1="INSERT INTO exercises (studno,mexercises,fexercises,term,course_code) VALUES ('$_SESSION[studno]','','".$getImplodeGrades."','','$_SESSION[Course_Code]')";
							$query=mysqli_query($connect,$sql1);
						}
				}
				?>
			<tr>
				<?php
					$ctr=$ctr_exer-1;
					if($checker==$ctr)
					{
						echo "<td colspan=2><b>Average:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='fxave' style='width:97.8%' value='" . round($fxave,2) .  "'/>";
						echo "<input type='hidden' name='mxave' style='width:97.8%' value='" . round($fxave,2) .  "'/>";
					}
					else
					{
						$fxave=NULL;
					}
				?>
				</td>
			</tr>
			<tr>
				<?php
					if(($fattd && $fvb && $fxave)!=NULL)
					{
						echo "<td colspan=2><b>Class Standing:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='fcs' style='width:97.8%' value='" . round($fcs,2) .  "'/></td>";
					}
					else
						$fcs=NULL;
				?>
			</tr>
			<tr>
				<td colspan=4><center><b>Quiz</b></center></td>
			</tr>
			<?php
			$checker1=0;
				$fq = array();
				$error = 0;
				$fqtotal=0;
				for($i=0;$i<$ctr_quiz-1;$i++)
				{
					$fq[$i]=$_POST["quiz$i"];
					$fqtotal=$fqtotal+$fq[$i];
					$fqave=$fqtotal/($ctr_quiz-1);
					$quizNo = $i + 1;
					echo "<tr><td colspan=2><b>Quiz " . $quizNo . "</b></td>";
					if($fq[$i] == NULL || $fq[$i]<50 || $fq[$i]>100)
					{
						echo "<td colspan=2><input type='text' name='quiz$i' style='width:94.8%' value='" . $fq[$i] .  "'/>";
						echo "<font color=red>*</td>";
						$error = $error + 1;
					}
					else
					{
						echo "<td colspan=2><input type='text' readonly name='". $fq[$i] ."' style='width:97.8%' value='" . $fq[$i] .  "'/></td></tr>";
						echo "<input type='hidden' name='quiz$i' style='width:97.8%' value='" . $fq[$i] .  "'/>";
						$a=1;
						
						$checker1=$checker1+$a;
						echo "<input type='hidden' name='checker' style='width:97.8%' value='" . $checker1 .  "'/>";
					}
				}
				
				$getImplodeQuizGrades = implode(",",$fq);
				if($error < 1){
					$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql2="UPDATE quizzes SET fquizzes ='".$getImplodeQuizGrades."'";
									$query=mysqli_query($connect,$sql2);
								}
							}
						}
						else
						{
							$sql3="INSERT INTO quizzes (studno,mquizzes,fquizzes,term,course_code) VALUES ('$_SESSION[studno]','','".$getImplodeQuizGrades."','','$_SESSION[Course_Code]')";
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
					if($checker1==$ctr)
					{
						echo "<td colspan=2><b>Average:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='fqave' style='width:97.8%' value='" . round($fqave,2) .  "'/>";
						echo "<input type='hidden' name='fqave' style='width:97.8%' value='" . round($fqave,2) .  "'/>";
					}
					else
					{
						$fqave=NULL;
					}
				?>
				</td>
			</tr>	
			<tr>
				<td colspan=2><b>Major Exam:</b></td>
				<td colspan=2><?php
					if($fexam==NULL || $fexam<50 || $fexam>100)
					{
						echo "<input type='text' name='fexam' style='width:94.8%' value='" . $fexam .  "'/>";
						echo "<font color=red>*";
						$fexam=NULL;
					}					
					else
					{
						echo "<input type='text' readonly name='fexam' style='width:97.8%' value='" . $fexam .  "'/>";	
						echo "<input type='hidden' name='mexam' style='width:97.8%' value='" . $fexam .  "'/>";
					}
				?></td>
			</tr>
			<tr>
				<?php 
					if($fexam!=NULL)
					{
						$fexamp=($fexam/100)*50+50;
						echo "<td colspan=2><b>Percentage(%):</b></td>";
						echo "<td colspan=2><input type='text' readonly name='fexamp' style='width:97.8%' value='" . round($fexamp,2).  "%'/></td>";
					}
					else
						$fexamp=NULL;
				?>
			</tr>	
			<tr>
				<?php 
					if(($fcs && $fqave && $fexamp)==NULL)
					$fg=NULL;
					else
					{
						$fg=($fcs/3)+($fqave/3)+($fexamp/3);
						echo "<td colspan=2><b>Final Grade:</b></td>";
						echo "<td colspan=2><input type='text' readonly name='fg' style='width:97.8%' value='" . round($fg,2) .  "'/></td>";
					}
					//$mg=$_REQUEST['mg'];
					$query="SELECT * FROM grades WHERE studno LIKE('$_SESSION[studno]')";
					$query_run=mysqli_query($connect,$query);
				
					if(mysqli_num_rows($query_run)>0)
					{
						while($row=mysqli_fetch_array($query_run))
						{
							$mg=$row['mg'];
						}
						$fcg=($mg/3)+(($fg*2)/3);

						if($fcg>=98 || $fcg==100)
						{
							$GPE="1.00";
							$remarks="PASSED";
						}
						elseif($fcg>=95 || $fcg==97)
						{
							$GPE="1.25";
							$remarks="PASSED";
						}
						elseif($fcg>=92 || $fcg==94)
						{
							$GPE="1.50";
							$remarks="PASSED";
						}
						elseif($fcg>=89 || $fcg==91)
						{
							$GPE="1.75";
							$remarks="PASSED";
						}
						elseif($fcg>=86 || $fcg==88)
						{
							$GPE="2.00";
							$remarks="PASSED";
						}
						elseif($fcg>=83 || $fcg==85)
						{
							$GPE="2.25";
							$remarks="PASSED";
						}
						elseif($fcg>=80 || $fcg==82)
						{
							$GPE="2.50";
							$remarks="PASSED";
						}
						elseif($fcg>=77 || $fcg==79)
						{
							$GPE="2.75";
							$remarks="PASSED";
						}
						elseif($fcg>=75 || $fcg==76)
						{
							$GPE="3.00";
							$remarks="PASSED";
						}
						else
						{
							$remarks="FAILED";
						}
					}
					else
						$fcg=NULL;
				?>
			</tr>
			<tr>
				<td colspan=4 align=right><?php
				
					$studno=$_SESSION["studno"];
					$fattd=$_POST["fattd"];
					$fvb=$_POST["fvb"];
					$fexam=$_POST["fexam"];
					$course_code=$_SESSION["Course_Code"];
					if(($fattd && $fvb && $fxave && $fcs && $fqave && $fexam && $fexamp && $fg)!=NULL)
					{
						$result="SELECT * FROM grades WHERE studno='$_SESSION[studno]'";
						$result=mysqli_query($connect,$result);
						
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_array($result))
							{
								if($row['studno']==$_SESSION["studno"])
								{
									$sql="UPDATE grades SET fattd='".$fattd."',fvb='".$fvb."',fexercises='".$getImplodeGrades."',fxave='".$fxave."',fcs='".$fcs."',fquizzes='".$getImplodeQuizGrades."',fqave='".$fqave."',fexam='".$fexam."',fexamp='".$fexamp."',fg='".$fg."',fcg='".$fcg."',GPE='".$GPE."',remarks='".$remarks."' WHERE studno= $studno";
								
									$query=mysqli_query($connect,$sql);
									if($query)
									{
										echo '<script type="text/javascript"> alert("Grades Succesfully Updated.") </script>';
										?>
										<input type="button" class='button' value="Back" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
									}
									else
									{
										echo '<script type="text/javascript"> alert("ERROR!") </script>';
										?><input type="button" class='button' value="Cancel" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
									}
								}
							}
						}
						else
						{
							$sql1="INSERT INTO grades (studno,Course_Code,mattd,fattd,mvb,fvb,mexercises,fexercise,mxave,fxave,mcs,fcs,mquizzes,fquizzes,mqave,fqave,mexam,fexam,mexamp,fexamp,mg,fg,fcg,remarks) VALUES ('$_SESSION[studno]','$course_code','','$_POST[fattd]','','$_POST[fvb]','','$getImplodeGrades','','$fxave','','$fcs','','$getImplodeQuizGrades','','$fqave','','$_POST[fexam]','','$fexamp','','$fg','$fcg','$GPE','$remarks')";
							
							$query=mysqli_query($connect,$sql1);
							if($query)
							{
								echo '<script type="text/javascript"> alert("Grades Succesfully Inserted.") </script>';
								?><input type="button" class='button' value="Back" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
							}
							else
							{
								echo '<script type="text/javascript"> alert("ERROR!") </script>';
								?><input type="button" class='button' value="Cancel" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
							}

						}
					}
					else
					{
						?><input type="submit" class='button' value="Submit" onclick="location='Midterm_Insertion_of_Grades.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/>
						<input type="button" class='button' value="Cancel" onclick="location='Grading.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>'"/><?php
					}
				?>
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