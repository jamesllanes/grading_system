<?php
	session_start();
	require 'dbconfig/config.php';
	
	if(!isset($_SESSION['username']))
	{
		header('location:Login_Page.php');
	}
	
	
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
<link rel="stylesheet" href="css/home_without_scroll.css">
<style>
</style>
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
		  <!--<li><a href="Subjects.php">Subject Load</a></li>-->
		  <!--<li><a href="#">Class List</a></li>-->
		</ul>
	</div>
</div>
	<div class="pageBarLeft">
		<div class="pageBarLeftTop">
			<h4>
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
			<!--<a class="w3-bar-item w3-button w3-hover-black" href="Sections.php">Sections</a>-->
			<a class="w3-bar-item w3-button w3-hover-black" href="Logout.php">Logout</a>
			<!--<form action="Home_Page.php" method="POST">
			<center><button name="logout" type="submit" class="logoutbtn">Logout</button><br></center>
			</form>
			<!--<a class="w3-bar-item w3-button w3-hover-black" href="#">Logout</a>-->
		</div>
	</div>

<div class="pageContent">
<?php
	/*$query="SELECT * FROM userinfotable WHERE username='$_SESSION[username]'";
	$query_run=mysqli_query($connect,$query);
	
	if(mysqli_num_rows($query_run)>0)
	{
		while($row=mysqli_fetch_array($query_run))
		{
			echo "<br><h2 style='margin-left:620px;'>Hello, ".$row['usertype'] ." ". $row['fullname']."<h2>";
		}
	}
	else
	{
		//invalid
		echo '<script type="text/javascript"> alert("No such User Exists!!!") </script>';
	}*/
?>
<table width=40% class="title" style='margin-left:500px;margin-top:50px'>
	<tr>
		<th>Vision and Mission</th>
	</tr>
	<tr>
		<td>To be in a sign of faith as an excellent educational institution, sharing in the Lasallian mission of teaching minds, touching hearts and transforming lives.</td>
	</tr>
</table>
<table width=30% class="title" style='margin-left:340px;margin-top:30px'>
	<tr>
		<th>Grades</th>
	</tr>
	<tr>
		<td>
			<b>Standard Grade Components and Weights</b>
			<li>Periodic (mid-term and end-term) grades are determined as follows:</li>
		</td>
	</tr>
	<tr>
		<td>
			<table class="grades" border=1>
				<tr>
					<td>Component</td><td>Weight</td><td></td>
				</tr>
				<tr>
					<td>Quizzes</td>
					<td>1/3</td>
					<td></td>
				</tr>
				<tr>
					<td>Class Standing</td>
					<td>1/3</td>
					<td>Recitation, seatworks, reports, compositions, term papers and other course requirements.</td>
				</tr>
				<tr>
					<td>Periodic Examinations</td>
					<td>1/3</td>
					<td></td>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<li>The final course grade is determined as follows:</li>
			<table class="grades" border=1 align=center>
				<tr>
					<td>Component</td><td>Weight</td>
				</tr>
				<tr>
					<td>Mid-Term Grade</td>
					<td>1/3</td>
				</tr>
				<tr>
					<td>End-Term Grade</td>
					<td>2/3</td>
				</tr>
			</table>
		</td>
	</tr>
</td>
</table>
<table width=30% class="title2" style='margin-left:320px;margin-top:30px'>
	<tr>
		<th colspan=2>The Grading System</th>
	</tr>
	<tr>
		<td colspan=2>
			<b>Standard Grade Components and Weights</b>
			<li>For Degree Programs</li>
		</td>
	</tr>
	<tr>
		<td>
			<table class="grades" border=1>
				<tr>
					<td>Grade Point</td><td>Equivalence</td>
				</tr>
				<tr>
					<td>1.00</td>
					<td>98 to 100</td>
				</tr>
				<tr>
					<td>1.25</td>
					<td>95 to 97</td>
				</tr>
				<tr>
					<td>1.50</td>
					<td>92 to 94</td>
				</tr>
				<tr>
					<td>1.75</td>
					<td>89 to 91</td>
				</tr>
				<tr>
					<td>2.00</td>
					<td>86 to 88</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="grades" border=1>
				<tr>
					<td>Grade Point</td><td>Equivalence</td>
				</tr>
				<tr>
					<td>2.25</td>
					<td>83 to 85</td>
				</tr>
				<tr>
					<td>2.50</td>
					<td>80 to 82</td>
				</tr>
				<tr>
					<td>2.75</td>
					<td>77 to 79</td>
				</tr>
				<tr>
					<td>3.00</td>
					<td>75 to 76</td>
				</tr>
				<tr>
					<td>5.00</td>
					<td>Below 75</td>
				</tr>
			</table>
		</td>
	</tr>
</td>
</table>
</div>
<!--<div class="pageFooter">
</div>
<div class="pageFooterSub">
</div>-->
</div>
</body>
</html>