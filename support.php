<?php
session_start();
?>
<html>
<title>Software Acceptance Support</title>
<body>
<h1><center>Software Acceptance Support</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Completion and deliverance of the software project, after the acceptance review and testing by the Joint Reviews, as per the contract. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. During the delivery process, some of the hardware components may be damaged, thereby rendering them useless or incompatible. 
<br/>
<br/><b>2. Providing initial and continuing support to the acquirer as specified in the contract. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. Insufficient documentation to provide for continuing support or initializing the system. 
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "supportAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
