<?php
session_start();
?>
<html>
<body>
<?php
$conn = mysql_connect('localhost', 'sfmea', 'sfmea');
mysql_select_db('sfmea', $conn);
mysql_query("update failure_modes set o = " . $_POST['o'] . ", s = " . $_POST['s'] . ", d = " . $_POST['d'] . ", recommendation = \"" . $_POST['recommend'] . "\" where f_id = " . $_SESSION['fId']);
$newRpn = $_POST['o'] * $_POST['s'] * $_POST['d'];
mysql_query("update failure_modes set rpn = " . $newRpn . " where f_id = " . $_SESSION['fId']);
mysql_query('update softwares set modified = now() where s_id = ' . $_SESSION['id']);
header('Location: list.php?' . htmlspecialchars(SID));
?>
</body>
</html>
