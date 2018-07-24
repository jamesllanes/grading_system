<?php
	require 'dbconfig/config.php';
		
	$query="INSERT INTO INSERT INTO students (studno, lastname, firstname, middlename, gender, program, section) VALUES		
('2015182491','Abellanosa','Kevin Brian','Male','BSIT','IT2C'),
('2015179861','Abgelina','King Joshua','Male','BSIT','IT2C'),
('2015182881','Agustin','JnAster Richard','Male','BSIT','IT2C'),
('2015182771','Algaba','David Christian','Male','BSIT','IT2C'),
('2015183671','Amer','Mohamad Al-khair','Male','BSIT','IT2C'),
('2015180261','Austria','Amabelle Joy','Female','BSIT','IT2C'),
('2015182591','Barretto','Ken Ferdine','Male','BSIT','IT2C'),
('2015183631','Barron','Nathalia','Female','BSIT','IT2C'),
('2015180431','Bautista','Aron','Male','BSIT','IT2C'),
('2014150461','Castillo','Patrizia Clarisse','Female','BSIT','IT2C'),
('2015181691','Chua','Angela Rose','Female','BSIT','IT2C'),
('2015180791','De Torres','Anne Paula','Female','BSIT','IT2C'),
('2014145161','Enriquez','Renzo Domini','Male','BSIT','IT2C'),
('2015181821','Entila','Entila Michael','Male','BSIT','IT2C'),
('2015182921','Figarola','Adrian Duncan','Male','BSIT','IT2C'),
('2015180831','Huelgas','Angela Nicole','Female','BSIT','IT2C'),
('2014143251','Ilagan','Carlos Christian','Male','BSIT','IT2C'),
('2015180121','Inocencio','Lourd Joshua','Male','BSIT','IT2C')

-------------------------------------------------------------
('2015181881','Landicho','James','Male','BSIT','IT2A'),
('2015180171','Libutan','Denise Angela','Female','BSIT','IT2A'),
('2015182531','Limbo','Arvie','Female','BSIT','IT2A'),
('2015182891','Modancia','John Reinel','Male','BSIT','IT2A'),
('2015180131','Montierro','Gabriel Francis','Male','BSIT','IT2A'),
('2015179761','Pabillano','Kamila Leigh','Female','BSIT','IT2A'),
('2015182861','Pillerba','John Paolo','Male','BSIT','IT2A'),
('2015181591','Policarpio','Clouie','Male','BSIT','IT2A'),
('2015181981','Requeza','Amiel Adrian','Male','BSIT','IT2A'),
('2015183601','Rogelio','Princess Xena','Female','BSIT','IT2A'),
('2015180801','Sadsad','Jerico','Male','BSIT','IT2A'),
('2015183091','Saludo','Roy Dan','Male','BSIT','IT2A'),
('2015180621','Tumbaga','Julius Ervin','Male','BSIT','IT2A')
('2015181471','Umali','Armel Joshua','Male','BSIT','IT2A')
('2015184051','Vegrara','Roilan Cyrus','Male','BSIT','IT2A')
('2015183971','Viray','Francis','Male','BSIT','IT2A')
		
		";
	$query_=mysqli_query($connect,$query);
?>