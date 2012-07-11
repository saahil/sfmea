<?php
session_start();
unset($_SESSION['fId']);
?>
<html>
<title>Edit or delete a Failure Mode</title>
<body>
<h1><center>Edit or delete a Failure Mode</center></h1>
<?php
$_SESSION['fId'] = $_POST["failId"];
$conn = mysql_connect('localhost', 'sfmea', 'sfmea');
if (!$conn) {
	echo "Connection to database failed";
	header('list.php');
}
mysql_select_db('sfmea', $conn);
$query = "select s_id, phase, step, f_mode, o, s, d, recommendation from failure_modes where f_id = " . $_SESSION['fId'];
$result = mysql_query($query);

if (!result) {
	echo "The Failure Mode Id is invalid. Please try again";
	header('Location: list.php?' . htmlspecialchars(SID));
}

echo "<form action = \"editPage.php?" . htmlspecialchars(SID) . "\" method = \"post\" />";
while ($row = mysql_fetch_array($result)) {
	echo "<br/><b>Failure mode id: </b>" . $_SESSION['fId'] . "<br/>";
	echo "<br/><b>Phase: </b>" . $row['phase'] . "<br/>";
	echo "<br/><b>Step: </b>" . $row['step'] . "<br/>";
	echo "<br/><b>Failure Mode: </b>" . $row['f_mode'] . "<br/>";
	echo "<br/><b>Occurrence: </b><input type = \"text\" name = \"o\" value = \"" . $row['o'] . "\"/><br/>";
	echo "<br/><b>Severity: </b><input type = \"text\" name = \"s\" value = \"" . $row['s'] . "\"/><br/>";
	echo "<br/><b>Detection: </b><input type = \"text\" name = \"d\" value = \"" . $row['d'] . "\"/><br/>";
	echo "<br/><b>Recommendation: </b><input type = \"text\" name = \"recommend\" value = \"" . $row['recommendation'] . "\"/><br/>"; 
}
echo "<br/><input type = \"submit\" value = \"Edit\"/>";
?>
</form>

<form action = "deletePage.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<input type = "submit" value = "Delete"/>
</form>

</body>
</html>
