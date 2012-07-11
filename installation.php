<?php
session_start();
?>
<html>
<title>Software Installation</title>
<body>
<h1><center>Software Installation</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Installation of the software product in accordance with the installation plan, in the target environment as designated in the contract. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The software code or the database does not initialize.
<br/>2. The software code or database initializes, but does not execute. 
<br/>3. The software code or database executes, but cannot be terminated. 
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "installationAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
