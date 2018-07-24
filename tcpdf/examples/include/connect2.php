<?php
//$con = mysql_connect("localhost","pma");
error_reporting(E_ALL ^ E_DEPRECATED);

	$connect = mysql_connect("localhost","root");
	if (!$connect)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
	mysql_select_db("dlsl_dbrecord",$connect);
	//mysql_select_db("fromariz", $con);
	error_reporting (E_ALL ^ E_NOTICE);
?>