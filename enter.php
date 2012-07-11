<?php
session_start();
?>

<html>
<title>Create New Software Project</title>
<body>
<h1><center><u>Welcome to the Software Failure Modes and Effect Analysis Tool</u></center></h1>
<br/>

<form action = "addProject.php" method = "post">
<br/><h2><i>Creating a new Software Project</i></h2><br/>
Project Name: <input type = "text" name = "swName"/><br/>
<br/><input type = "submit" value = "Add project to database" />
</form>

</body>
</html>
