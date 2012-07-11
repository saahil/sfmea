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

$phase = "Software Architectural Design";
if ($_POST["step"] == 1) {
	$step = "Transformation of the requirements for the software item into an architecture that describes the top-level structure and identifies the software component, by the developer.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "One or more requirements for the software item are not allocated to their software components.";
				$o = 3;
				$s = 4; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "The architecture for some software item is not documented or not properly documented.";
				$o = 1;
				$s = 9;
				$d = 2;
				$recommend = "None";
				break;
		case 3: $failMode = "Due to no refinement of the software components, detailed design is made difficult or impossible, by the software architectural design.";
				$o = 2;
				$s = 10;
				$d = 3;
				$recommend = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Development and documentation of a top-level design of the database.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The documentation fails to provide support regarding particular anomalies with the database.";
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

else if ($_POST["step"] == 3) {
	$step = "Developement of preliminary versions of the documentations and test requirements, along with the schedule for Software Integration.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The documentation fails to provide support regarding particular anomalies with the system.";
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

else if ($_POST["step"] == 4) {
	$step = "Evaluation of the architecture of the software item and the interface and database designs considering various criterion. The results of the evaluation should be properly documented.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The requirements cannot be back-traced from the software item.";
				$o = 2;
				$s = 2; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "The software item is not externally consistent with the requirements.";
				$o = 2;
				$s = 2;
				$d = 3;
				$recommend = "None";
				break;
		case 3: $failMode = "The software items are not internally consistent among themselves.";
				$o = 2;
				$s = 2;
				$d = 3;
				$recommend = "None";
				break;
		case 4: $failMode = "The detailed design is not feasible on the framework provided by the software architecture.";
				$o = 3; 
				$s = 8;
				$d = 3;
				$recommend = "None";
				break;
		case 5: $failMode = "The operation and maintenance is not feasible on the detailed design of the software.";
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
echo "Insertion Successful <br/>";
header('Location: list.php?' . htmlspecialchars(SID));
?>

</body>
</html>
