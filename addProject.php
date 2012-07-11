<?php
session_start();
?>
<html>
<body>

<?php
$conn = mysql_connect("localhost", "sfmea", "sfmea");
if(!$conn) {
	die ('Could not connect: ' . mysql_error());
}

mysql_select_db("sfmea", $conn);

mysql_query("insert into softwares(s_name, created, modified) values ('" . $_POST["swName"] . "', now(), now())");

echo "Creation successful";

header('Location: index.php?' . htmlspecialchars(SID));
?>

</body>
</html>
