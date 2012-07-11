<?php
session_start();
?>
<html>
<body>

<?php
$conn = mysql_connect("localhost", "sfmea", "sfmea");
if (!$conn)
	die('Could not connect: ' . mysql_error());

mysql_select_db("sfmea", $conn);

$phase = "Software Installation" ;
if ($_POST["step"] == 1) {
	$step = "Installation of the software product in accordance with the installation plan, in the target environment as designated in the contract.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The software code or the database does not initialize.";
				$o = 2;
				$s = 3; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "The software code or database initializes, but does not execute.";
				$o = 2;
				$s = 3;
				$d = 3;
				$recommend = "None";
				break;
		case 3:
				$failMode = "The software code or database executes, but cannot be terminated. ";
				$o = 2;
				$s = 3;
				$d = 3;
				$recommend = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else {
	echo "Invalid choice"; 
	exit;
}

$rpn = $o * $s * $d; 
$ins = "insert into failure_modes(s_id, phase, step, f_mode, o, s, d, rpn, recommendation) values(" . $_SESSION['id'] . ", '" . $phase . "', '" . $step . "', '" . $failMode . "', " . $o . ", " . $s . ", " . $d . ", " . $rpn . ", '" . $recommend . "')";
mysql_query($ins);

mysql_query('update softwares set modified = now() where s_id = ' . $_SESSION['id']);
echo "Insertion Successful <br/>";
header('Location: list.php?' . htmlspecialchars(SID));
?>

</body>
</html>
