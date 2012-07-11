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

$phase = "Software and System Qualification Testing";
if ($_POST["step"] == 1) {
	$step = "Conduction of software qualification testing in accordance with the qualification requirements for the software item.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The results do not confirm with the expected results of the software item.";
				$o = 1;
				$s = 1; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "The results of the conducted tests are not documented properly.";
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
	$step = "Evaluation of the integrated system, along with software items and hardware modules, in accordance with the qualification requirements specified for the system.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The results do not confirm with the expected results of the system.";
				$o = 1;
				$s = 1; 
				$d = 3;
				$recommend = "None";
				break;
		case 2:
				$failMode = "The system is rendered undeliverable at some stage.";
				$o = 1; 
				$s = 1;
				$d = 3;
				$recommend = "Trace back the stages to the initial step of development phase and rectify at the last known error point.";
				break;
		case 3:
				$failMode = "The results of the conducted tests are not documented properly.";
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
