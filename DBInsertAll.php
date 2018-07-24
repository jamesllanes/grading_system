<?php
	require 'dbconfig/config.php';

	$con = mysql_connect("localhost","root");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("dbrecord", $con);
		
	$query="INSERT INTO INSERT INTO students (studno, lastname, firstname, middlename, gender, program, section) VALUES
		('2015177651', 'Agustin', 'Paul', '', 'Male', 'BSIT', 'IT2B'),
		('2015179331', 'Alad', 'Venjo', '', 'Male', 'BSIT', 'IT2B'),
		('2015178081', 'Alcantara', 'Kyrah Nicole', '', 'Female', 'BSIT', 'IT2B'),
		('2015178451', 'Mendoza', 'Claire Antonette', '', 'Female', 'BSIT', 'IT2B'),  
		('2015175031', 'Alcantara', 'Ma. Christine', '', 'Female', 'BSIT', 'IT2B'),
		('2015178831', 'Anilllo', 'Joy', '', 'Female', 'BSIT', 'IT2B'),
		('2015175181', 'Areta', 'Tristan Paulo', '', 'Male', 'BSIT', 'IT2B'),
		('2015179971', 'Buñag', 'John Angelo', '', 'Male', 'BSIT', 'IT2B'),
		('2015176181', 'Cabrera', 'Ma. Raya Louise', '', 'Female', 'BSIT', 'IT2B'),
		('2015176851', 'Canonigo', 'Jethro', '', 'Male', 'BSIT', 'IT2B'),
		('2015176921', 'Castilo', 'Ian Gabriel', '', 'Male', 'BSIT', 'IT2B'),
		('2015174431', 'Cebreros', 'Frances Gillian', '', 'Female', 'BSIT', 'IT2B'),
		('2015178841', 'Claud', 'Jed Maruen', '', 'Male', 'BSIT', 'IT2B'),
		('2015175651', 'Egar', 'Robert Francis', '', 'Male', 'BSIT', 'IT2B'),
		('2015178781', 'Gamo', 'Ralph Timothy', '', 'Male', 'BSIT', 'IT2B'),
		('2015178441', 'Hernandez', 'Brent  Angelo', '', 'Male', 'BSIT', 'IT2B'),
		('2015176171', 'Lambio', 'Arvin', '', 'Male', 'BSIT', 'IT2B'),
		('2015171541', 'Llamas', 'Benedict', '', 'Male', 'BSIT', 'IT2B'),
		('2015176801', 'Llanes', 'Darlene', '', 'Female', 'BSIT', 'IT2B'),
		('2015179941', 'Llanes', 'Jessie James', 'Dela Cruz', 'Male', 'BSIT', 'IT2B'),
		('2015175621', 'Magahis', 'Eryl Justin', '', 'Male', 'BSIT', 'IT2B'),
		('2015176051', 'Malonzo', 'Dominic Elijah', '', 'Male', 'BSIT', 'IT2B'),
		('2015173841', 'Manalo', 'Angelyn Joy', '', 'Female', 'BSIT', 'IT2B'),
		('2015173421', 'Marinay', 'Roselyn Kaye', '', 'Female', 'BSIT', 'IT2B'),
		('2015174401', 'Mosca', 'Joshua Abraham', '', 'Male', 'BSIT', 'IT2B'),
		('2015176711', 'Narvaez', 'Marc Neil', '', 'Male', 'BSIT', 'IT2B'),
		('2015175061', 'Olivarez', 'Reinnier', '', 'Male', 'BSIT', 'IT2B'),
		('2015174851', 'Padua', 'Jonathan', '', 'Male', 'BSIT', 'IT2B'),
		('2015175701', 'Panopio', 'Ralph', '', 'Male', 'BSIT', 'IT2B'),
		('2015175611', 'Perez', 'Christian Aldrin', '', 'Male', 'BSIT', 'IT2B'),
		('2015175541', 'Punay Jr.', 'Charche', '', 'Male', 'BSIT', 'IT2B'),
		('2015174721', 'Quinonez', 'Ronald', '', 'Male', 'BSIT', 'IT2B'),
		('2015183851', 'Ramos', 'Daphne Denise', 'Castillo', 'Female', 'BSIT', 'IT2B'),
		('2015175561', 'Ramos', 'Mark Gerald', 'Male', 'BSIT', 'IT2B',
		
2015178981	Villegas	Kate Ann
2015176071	Valencia	Erwin
2015178791	Soriano	Kate Mekaela
2015178241	Santos	Ron Aldrine
2015174661	Ramos	Stanley Freud
		";
	$query_=mysqli_query($connect,$query);
?>