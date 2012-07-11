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

$phase = "Software Requirement Analysis";
if ($_POST["step"] == 1) {
	$step = "Establishing and documenting software requirements, including quality characteristics specifications.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The software plan doesn't meet the capacity specifications viz. Performance, physical characteristics and environmental conditions under which operations are going to take place.";
				$o = 1;
				$s = 1; 
				$d = 2;
				$recommend = "None";
				break;
		case 2: $failMode = "Failure of interfaces external to the system.";
				$o = 2;
				$s = 3;
				$d = 3;
				$recommend = "The interface programming should be kept seperate from the back-end application, for the sake of convienient replacement or change in the interface or back-end alone.";
				break;
		case 3: $failMode = "Failure at the human-factor engineering specifications, like human-equipment interfaces and sesitive areas requiring considerable human intervention at all/some times";
				$o = 2;
				$s = 3;
				$d = 3;
				$recommend = "None";
				break;
		case 4: $failMode = "Errors or anomalies in the data definition and database requirements";
				$o = 3; 
				$s = 5; 
				$d = 2;
				$recommend = "None";
				break;
		case 5: $failMode = "Improper user documentation";
				$o = 1;
				$s = 9;
				$d = 2;
				$recomment = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Evaluation of the software requirements.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The system requirements are not back traceable to the system design.";
				$o = 2;
				$s = 2; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "The software modules are not testable, either in isolation or as a whole system itself.";
				$o = 2;
				$s = 3;
				$d = 2;
				$recommend = "None";
				break;
		case 3: $failMode = "In the worst case, the software design is not feasible to implementation.";
				$o = 3; 
				$s = 8; 
				$d = 3;
				$recommend = "The design should either be reconsidered from scratch, or only some modules of the software system should be re-designed.";
				break;
		case 4: $failMode = "Even though the software design is feasible, the operations and maintenance of the designed system is not.";
				$o = 1; 
				$s = 9; 
				$d = 2;
				$recommend = "The design should either be reconsidered from scratch, or only some modules of the software system should be re-designed.";
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
