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

$phase = "Software and System Integration";
if ($_POST["step"] == 1) {
	$step = "Integration of the software components and software units into the software item.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Not all aggregates satisfy the requirements of the software item.";
				$o = 2;
				$s = 2; 
				$d = 2;
				$recommend = "None";
				break;
		case 2: $failMode = "The software item is not integrated at the conclusion of the integration activity.";
				$o = 3;
				$s = 4;
				$d = 3;
				$recommend = "None";
				break;
		case 3:
				$failMode = "The integration activity is not properly documented.";
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
	$step = "Integration of the software configuration item, with hardware configuration items, manual operations, and other systems as necessary, into the system.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The software aggregates do not integrate with the hardware components and configuration items.";
				$o = 3;
				$s = 4; 
				$d = 3;
				$recommend = "Some minor changes to the software modules usually results in a total compatibility with the hardware components made use of. As an alternative, if feasible, hardware items can be replaced with ones that are compatible with the software item.";
				break;
		default:
				echo "Invalid Choice";
				exit;
	}
}

else if ($_POST["step"] == 3) {
	$step = "Evaluation of the integrated system and documentation of the results.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The integrated system is not back-traceable to the system requirements.";
				$o = 2;
				$s = 2; 
				$d = 2;
				$recommend = "None";
				break;
		case 2:
				$failMode = "External inconsistency with the system requirements.";
				$o = 2; 
				$s = 4; 
				$d = 2;
				$recommend = "None";
				break;
		case 3:
				$failMode = "Internal inconsistencies.";
				$o = 2; 
				$s = 4;
				$d = 2;
				$recommend = "None";
				break;
		case 4:
				$failMode = "The test standards and methods used are not appropriate.";
				$o = 1;
				$s = 9;
				$d = 2;
				$recommend = "None";
				break;
		case 5:
				$failMode = "Software and system qualification testing are not feasible, based on the resultant integrated system.";
				$o = 3;
				$s = 8;
				$d = 2;
				$recommend = "None";
				break;
		case 6:
				$failMode = "Operations and maintenance are not feasible, based on the resultant integrated system.";
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
