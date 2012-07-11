<?php
session_start();
if (!isset($_SESSION['id'])) $_SESSION['id'] = $_POST["swId"];
?>

<html>
<title>
<?php
$con = mysql_connect('localhost', 'sfmea', 'sfmea');
mysql_select_db('sfmea', $con);
$que = mysql_query('select s_name from softwares where s_id = ' . $_SESSION['id']);
while ($res = mysql_fetch_array($que)) {
	echo $res['s_name'];
}
?>
</title>
<body>

<a href = "index.php?<?php echo htmlspecialchars(SID); ?>">Home</a>
<h1><b><center>Current project - 
<?php 
$conn = mysql_connect("localhost", "sfmea", "sfmea"); 

mysql_select_db("sfmea", $conn);
$result = mysql_query("select s_name from softwares where s_id = " . $_SESSION['id']);
while ($row = mysql_fetch_array($result)) {
	echo $row['s_name'];
}
?> </center></b></h1>

<br/>

<?php
$con = mysql_connect("localhost", "sfmea", "sfmea");
if (!con) {
	die("Could not connect to the database" . mysql_error());
}

mysql_select_db("sfmea", $con);

$result = mysql_query("select f_id, phase, step, f_mode, o, s, d, rpn, recommendation from failure_modes, softwares where failure_modes.s_id = softwares.s_id and softwares.s_id = " . $_SESSION['id']);
echo "<table border = '1'>
<tr>
<th>S.no</th>
<th>Development Phase</th>
<th>-------------------------------Step-------------------------------</th>
<th>-------------------------------Mode-------------------------------</th>
<th>O</th>
<th>S</th>
<th>D</th>
<th>RPN</th>
<th>-------------------------Recommendation---------------------------</th>
</tr>";

while ($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['f_id'] . "</td>";
	echo "<td>" . $row['phase'] . "</td>";
	echo "<td>" . $row['step'] . "</td>";
	echo "<td>" . $row['f_mode'] . "</td>";
	echo "<td>" . $row['o'] . "</td>";
	echo "<td>" . $row['s'] . "</td>";
	echo "<td>" . $row['d'] . "</td>";
	echo "<td>" . $row['rpn'] . "</td>";
	echo "<td>" . $row['recommendation'] . "</td>";
}

?>
<br/>
<br/>O = Occurrence<br/>S = Severity<br/>D = Detection<br/>RPN = Risk Priority Number (O x S x D)<br/>
<br/><b>Occurrence</b>, or the probability of a failure mode to occur, is estimated on a scale of cardinal numbers 1 to 3. 1 denotes a <b>high probability</b> of occurrence and 3 denotes a <b>rare occurrence</b>.
<br/><b>Severity</b> of a failure mode is estimated on a scale of 1 to 10, cardinal numbers only. 1 denotes a <b>highly severe</b> failure mode and 10 denotes a failure mode of <b>negligible severity</b>. 
<br/><b>Detection</b> refers to the probability of a failure mode being detected at the right time, so as to minimize the effects. It is approximated on a scale of 1 to 3, with 1 denoting a failure mode with <b>low</b> detection and 3 denoting a failure mode with <b>high</b> detection.
<br/>
<br/><h3>Edit a failure mode's O, S or D values</h3>

<form action = "edit.php" method = "post">
The S.no of the failure mode: <input type = "text" name = "failId"/>
<input type = "submit" value = "Edit"/>
</form>

<br/><a href = "newMode.php?<?php echo htmlspecialchars(SID); ?>">Click here</a> to add another failure mode<br/>
<br/>
<br/><h3>Current development phases under monitoring</h3><br/>


</body>
</html>
