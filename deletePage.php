<?php
session_start();
?>
<html>
<body>
<?php
$conn = mysql_connect('localhost', 'sfmea', 'sfmea');
if (!$conn) {
	echo "Could not form connection";
	exit();
}

mysql_select_db('sfmea', $conn);
mysql_query("delete from failure_modes where f_id = " . $_SESSION['fId']);
mysql_query('update softwares set modified = now() where s_id = ' . $_SESSION['id']);
header('Location: list.php?' . htmlspecialchars(SID));
?>

</body>
</html>
