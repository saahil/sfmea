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

$phase = "Software Acceptance Support";
if ($_POST["step"] == 1) {
	$step = "Completion and deliverance of the software project, after the acceptance review and testing by the Joint Reviews, as per the contract.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "During the delivery process, some of the hardware components may be damaged, thereby rendering them useless or incompatible.";
				$o = 1;
				$s = 9; 
				$d = 2;
				$recommend = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Providing initial and continuing support to the acquirer as specified in the contract.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Insufficient documentation to provide for continuing support or initializing the system.";
				$o = 1;
				$s = 9; 
				$d = 2;
				$recommend = "None";
				break;
		default:
				echo "Invalid Choice";
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
