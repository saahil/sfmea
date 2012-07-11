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

$phase = "Process Implementation";
if ($_POST["step"] == 1) {
	$step = "Selection of software life cycle model appropriate to the the scope, complexity and magnitude of the project.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The model fails to cope up with the complexity of the system, at a certain stage of time in its life cycle.";
				$o = 1;
				$s = 7; 
				$d = 2;
				$recommend = "Increase the resources(scalable systems). Re-design the system on a different model(non-scalable system)";
				break;
		case 2: $failMode = "Chosen model does not fit the complexity requirement, to start with";
				$o = 2;
				$s = 2;
				$d = 1;
				$recommend = "Discard the life cycle model and choose a different model";
				break;
		default:
				echo "Invalid choice". 
				exit;
	}
}

else if ($_POST["step"] == 2) {
	$step = "Documentation of outputs, configuration management process, problem resolving and supporting procedures";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "The documentation, plans, results obtained by the chosen life cycle model does not reach the concerned management, development or maintenance team.";
				$o = 1;
				$s = 9; 
				$d = 2;
				$recommend = "Heirarchical development and management team must be formed and each concerned observation record or plan should be sent to the corresponding node of this heirarchy.";
				break;
		case 2: $failMode = "Configuration specification for a certain component of the software project is not defined or not properly documented.";
				$o = 3;
				$s = 4;
				$d = 1;
				$recommend = "None";
				break;
	}
}

else if ($_POST["step"] == 3) {
	$step = "Selection and use of those standards, methods, tools and programming language that are documented, appropriate and established by the organization for performing activities of the Development Process.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Documentation for the selected tools or programming languages not sufficient to carry out the required tasks.";
				$o = 3;
				$s = 8; 
				$d = 1;
				$recommend = "If the contract allows, choose a different platform or tool to work with.";
				break;
		case 2: $failMode = "The required tasks cannot be performed under the limitations of the chosen framework or programming tools.";
				$o = 1;
				$s = 9;
				$d = 3;
				$recommend = "If required, use some other technology to perform the tasks that cannot be achieved using the specified platforms. Then use appropriate bridges to connect the works together.";
				break;
	}
}

else if ($_POST["step"] == 4) {
	$step = "Development of plans for ensuring safety and security of the system, including specific standards, methods, tools, actions and responsibility associated with the development and qualification of all the requirements.";
	switch ($_POST["fMode"]) {
		case 1: 
				$failMode = "Some part of the system is left vulnerable to some kind of an external attack.";
				$o = 3;
				$s = 5; 
				$d = 1;
				$recommend = "Trace the vulnerablity path and cover the loopholes using some kind of authentication procedure for the users of the system.";
				break;
		case 2: $failMode = "The security is made too strong for even the authorized users and admins to perform required tasks.";
				$o = 2;
				$s = 3;
				$d = 3;
				$recommend = "Introduce access levels to the system, limiting access using different levels of priveleges.";
				break;
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
