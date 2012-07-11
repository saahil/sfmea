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

$phase = "Software Coding and Testing";
if ($_POST["step"] == 1) {
	$step = "Development of each software unit and database.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Possible system errors resulting in termination of the development process in incomplete stages.";
				$o = 3;
				$s = 4; 
				$d = 3;
				$recommend = "If power failure is imminent, use proper power backup. In case of modular programming methods, the smaller modules or functions should be saved and compiled every once in a while, to preserve meaningful algorithm implementations. Use of platforms with journaling filesystems is recommended because they retain a considerable amount of data in case of improper shutdown of the system.";
				break;
		case 2: $failMode = "The databse server located on a remote system fails, even though the local client machine is up and running.";
				$o = 3;
				$s = 4;
				$d = 3;
				$recommend = "Methods like Shadow Copy schemes must be made use of, for the storage of data in the database. In case of power failure on the server side, only the committed data till the last rollback is available for the programmer to work upon.";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Testing of each software unit and database to ensure that it satisfies its requirements.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Upon testing, the software modules or database give incorrigible results, for a given set of test data.";
				$o = 3;
				$s = 5; 
				$d = 1;
				$recommend = "None";
				break;
		case 2:
				$failMode = "The software modules or database, don't give any results at all, for a given set of test data.";
				$o = 3; 
				$s = 5; 
				$d = 3;
				$recommend = "None";
				break;
		case 3:
				$failMode = "The software modules or database fail at some load limit or input size, and start behaving in an inappropriate manner.";
				$o = 1; 
				$s = 7;
				$d = 2;
				$recommend = "None";
				break;
		default:
				echo "Invalid Choice";
				exit;
	}
}

else if ($_POST["step"] == 3) {
	$step = "Evaluation of software code and test results, and its documentation.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The software item is not back-traceable to the requirements of the system.";
				$o = 2;
				$s = 2; 
				$d = 2;
				$recommend = "None";
				break;
		case 2:
				$failMode = "The software item is inconsistent with the requirements.";
				$o = 2; 
				$s = 2; 
				$d = 2;
				$recommend = "None";
				break;
		case 3:
				$failMode = "There are internal inconsistencies between the unit requirements.";
				$o = 3; 
				$s = 4;
				$d = 2;
				$recommend = "None";
				break;
		case 4:
				$failMode = "Software integration and testing are not feasible, based on the final item design.";
				$o = 3;
				$s = 8;
				$d = 2;
				$recommend = "None";
				break;
		case 5:
				$failMode = "Operation and maintenance are not feasible, based on the final item design.";
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
