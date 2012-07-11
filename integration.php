<?php
session_start();
?>
<html>
<title>System and Software Integration</title>
<body>
<h1><center>System and Software Integration</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Integration of the software components and software units into the software item. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. Not all aggregates satisfy the requirements of the software item.  
<br/>2. The software item is not integrated at the conclusion of the integration activity.
<br/>3. The integration activity is not properly documented.    
<br/>
<br/><b>2. Integration of the software configuration item, with hardware configuration items, manual operations, and other systems as necessary, into the system. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. The software aggregates do not integrate with the hardware components and configuration items. 
<br/>
<br/><b>3. Evaluation of the integrated system and documentation of the results. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The integrated system is not back-traceable to the system requirements. 
<br/>2. External inconsistency with the system requirements.
<br/>3. Internal inconsistencies. 
<br/>4. The test standards and methods used are not appropriate.
<br/>5. Software and system qualification testing are not feasible, based on the resultant integrated system.
<br/>6. Operations and maintenance are not feasible, based on the resultant integrated system.  
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "integrationAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
