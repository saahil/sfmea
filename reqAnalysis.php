<?php
session_start();
?>
<html>
<title>Software Requirement Analysis</title>
<body>
<h1><center>Software Requirement Analysis</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Establishing and documenting software requirements, including quality characteristics specifications. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The software plan doesn't meet the capacity specifications viz. Performance, physical characteristics and environmental conditions under which operations are going to take place. 
<br/>2. Failure of interfaces external to the software item. 
<br/>3. Failure at the level of Human-factor engineering specifications, like human-equipment interfaces and sensitive areas requiring considerable human intervention at all/some times. 
<br/>4. Errors or anomalies in the data definition and database requirements. 
<br/>5. Improper user documentation. 
<br/>
<br/><b>2. Evaluation of the software requirements. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. The system requirements are not back traceable to the system design. 
<br/>2. The software modules are not testable, either in isolation or as a whole system itself.
<br/>3. In the worst case, the software design is not feasible to implementation. 
<br/>4. Even though the software design is feasible, the operations and maintenance of the designed system is not. 

<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "reqAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
