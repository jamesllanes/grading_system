<html>
<body>

<?php
require("include/connect2.php");
"<table border='1' border-color='black'><tr>";
$query = mysql_query("SELECT * FROM grades");
if (false === $query) {
	echo mysql_error();
}
elseif(mysql_num_rows($query)>0)
{
while($row = mysql_fetch_array($query))
{
	$mexercises=$row['mexercises'];
	$array =  explode(',', $mexercises);

	foreach ($array as $item)
	{
	    echo "<td>$item</td>";
	}
}
"</tr></table>";
}
?>

</body>
</html>