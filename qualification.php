<?php
session_start();
?>
<html>
<title>Software and System Qualification Testing</title>
<body>
<h1><center>Software and System Qualification Testing</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Conduction of software qualification testing in accordance with the qualification requirements for the software item. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The results do not confirm with the expected results of the software item.  
<br/>2. The results of the conducted tests are not documented properly.
<br/>
<br/><b>2. Evaluation of the integrated system, along with software items and hardware modules, in accordance with the qualification requirements specified for the system. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. The results do not confirm with the expected results of the system.
<br/>2. The system is rendered undeliverable at some stage.
<br/>3. The results of the conducted tests are not documented properly.
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "qualificationAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
