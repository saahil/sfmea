<?php
session_start();
session_destroy();
?>

<html>
<title>Software FMEA</title>
<body>

<h1><center><u>Welcome to Software Failure Modes and Effect Analysis tool</u></center></h1><br/>

<br/><h3><i>Select Software Project</i></h3><br/>

<form action = "list.php?<?php echo htmlspecialchars(SID); ?>" method = "post">

<?php
$conn = mysql_connect("localhost", "sfmea", "sfmea");
if (!$conn) {
	die('Could not connect: ' . mysql.error());
}

mysql_select_db("sfmea", $conn);

$result = mysql_query("select * from softwares");

echo "<select name = \"swId\">";

while ($row = mysql_fetch_array($result)) {
	echo "<option value = " . $row['s_id'] . ">". $row['s_name'];
}

echo "</select>";
?>

<br/><input type = "submit" value = "Show table" /><br/>

</form>

<br/><h3><i>Or <a href = "enter.php?<?php echo htmlspecialchars(SID); ?>">add a new software project</a></i></h3><br/>

</body>
</html>
