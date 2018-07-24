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
	if($chk==1)
	{
		$ctr_exer=$_REQUEST['ctr_exer'];
		$_SESSION['ctr_exer']=$ctr_exer;
		//$ctr_exer=$_SESSION['ctr_exer'];

		$ctr_quiz=$_REQUEST['ctr_quiz'];
		$_SESSION['ctr_quiz']=$ctr_quiz;
		//$ctr_quiz=$_SESSION['ctr_quiz'];
	}
	
	//$Course_Code=$_REQUEST['Course_Code'];
	//$_SESSION['Course_Code']=$Course_Code;
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
		  <li><a href="Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>">Section</a></li>
		  <?php
		  if($chk==0)
		{
		?>
		  <li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0">Student</a></li>
		  <li><a href="Grading.php?studno=<?php echo $studno;?>&chk=0&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>">Grading</a></li>
		<?php
		}
		else
		{
		?>
		  <li><a href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $ctr_exer?>&ctr_quiz=<?php echo $ctr_quiz?>">Student</a></li>
		  <li><a href="Grading.php?studno=<?php echo $studno;?>&chk=0&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>">Grading</a></li><?php
		}
		?>
		  
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
		<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>">Sections</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0"><?php echo $_SESSION['section'] ?> Class List</a>
		<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
		</div>
	</div>
</div>

<div class="pageContent">
		<table border=1 width=40% style='margin-left:490px;margin-top:50px'>
			<th colspan=3>Grading</th><br>
				<tr>
				<?php if($chk==0) 
				{
					?>					
					<td><input type="button" class='button' value="Midterm Grading" style="width:100%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo 1?>&ctr_quiz=<?php echo 1?>'" /></td>
					<td><input type="button" class='button' value="Final Grading" style="width:100%" onclick="location='Finals_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo 1?>&ctr_quiz=<?php echo 1?>'"/></td>
					<td><input type="button" class='button' value="Cancel" style="width:100%" onclick="location='Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=0&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>'"/></td>
					<?php
				}
				else
				{
					?>
					<td><input type="button" class='button' value="Midterm Grading" style="width:100%" onclick="location='Midterms_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=1&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>'" /></td>
					<td><input type="button" class='button' value="Final Grading" style="width:100%" onclick="location='Finals_Grading_Sheet.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&studno=<?php echo $_SESSION['studno']?>&chk=0&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>'"/></td>
					<td><input type="button" class='button' value="Cancel" style="width:100%" onclick="location='Students.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>&chk=1&ctr_exer=<?php echo $_SESSION['ctr_exer']?>&ctr_quiz=<?php echo $_SESSION['ctr_quiz']?>'"/></td>
					<?php
				}?>
				<tr>
		</table>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>