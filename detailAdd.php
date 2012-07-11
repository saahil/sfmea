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

$phase = "Software Detailed Design";
if ($_POST["step"] == 1) {
	$step = "Development of a detailed design for each software component of the software item. The software component shall be refined into lower levels containing software units that can be coded, compiled and tested.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "One or more software components can't be broken down into logical module units that can be coded and compiled seperately.";
				$o = 3;
				$s = 4; 
				$d = 3;
				$recommend = "None";
				break;
		case 2: $failMode = "All software requirements are not allocated from the software components to the software units.";
				$o = 2;
				$s = 2;
				$d = 2;
				$recommend = "None";
				break;
		case 3: $failMode = "There is no proper documentation available for the detailed design.";
				$o = 1;
				$s = 9;
				$d = 3;
				$recommend = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Development and documentation of a detailed design for the interfaces external to the software components and between the software components and software units.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "One or more interfaces fail to integrate in the required way with each other, resulting in a loss of data or communication in the channel.";
				$o = 3;
				$s = 5; 
				$d = 1;
				$recommend = "None";
				break;
		case 2:
				$failMode = "The inter-communication between the different software modules of the software item fails to implement, due to improper message passing or procedure returns.";
				$o = 3; 
				$s = 5; 
				$d = 1;
				$recommend = "None";
				break;
		case 3:
				$failMode = "The documentation of the detailed design of the interfaces fails to provide, when needed.";
				$o = 1; 
				$s = 9;
				$d = 3;
				$recommend = "None";
				break;
		default:
				echo "Invalid Choice";
				exit;
	}
}

else if ($_POST["step"] == 3) {
	$step = "Development and documentation of the detailed design of the database.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The database model does not satisfy the required Normal Form as specified in the system requirement specification.";
				$o = 2;
				$s = 2; 
				$d = 3;
				$recommend = "Break the tables according to the rules and algorithms of the specified Normal Forms. Generally, the preferred normal form is BCNF or 4NF(for multivalues attributes).";
				break;
		case 2:
				$failMode = "There is redundancy of data in the finally designed tables.";
				$o = 3; 
				$s = 6; 
				$d = 2;
				$recommend = "Some normal form (preferably >3) should be employed in the schema design of the database, to remove or reduce the amount of redundant data from the database design.";
				break;
		case 3:
				$failMode = "There are not enough attributes for an entity to establish meaningful relations between more than one entity sets.";
				$o = 2; 
				$s = 2;
				$d = 3;
				$recommend = "None";
				break;
		case 4:
				$failMode = "Due to the expected large size of the database, the search/query process will imminently take a large amount of time.";
				$o = 2;
				$s = 10;
				$d = 3;
				$recommend = "Make use of some type of indexing(sorted or unsorted) on the data items to speed up the search process.";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 4) {
	$step = "Definition and documentation of test requirements and schedule for testing software units.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The test requirements don't include stressing the software unit at the limits of its requirements.";
				$o = 3;
				$s = 4; 
				$d = 1;
				$recommend = "None";
				break;
		case 2: $failMode = "Improper documentation for the test requirements, leading to the eventual failure of some parts of the system at the time of testing.";
				$o = 3;
				$s = 4;
				$d = 2;
				$recommend = "None";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 5) {
	$step = "Evaluation of the software design and test requirements.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The detailed design is not back traceable to the requirements of the software item.";
				$o = 2;
				$s = 2; 
				$d = 3;
				$recommend = "None";
				break;
		case 2:
				$failMode = "The design is not externally consistent with the architectural design.";
				$o = 3; 
				$s = 4; 
				$d = 2;
				$recommend = "None";
				break;
		case 3:
				$failMode = "There is no internal consistency between software componenets and software units.";
				$o = 3; 
				$s = 4;
				$d = 2;
				$recommend = "None";
				break;
		case 4:
				$failMode = "The testing process defined by the detailed design process is not feasible at some level.";
				$o = 3;
				$s = 8;
				$d = 3;
				$recommend = "None";
				break;
		case 5:
				$failMode = "The operation and maintenance process is not feasible on the structure defined by the detailed design phase.";
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
