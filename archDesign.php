<?php
session_start();
?>
<html>
<title>Software Architectural Design</title>
<body>
<h1><center>Software Architectural Design</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Transformation of the requirements for the software item into an architecture that describes the top-level structure and identifies the software component, by the developer. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. One or more requirements for the software item are not allocated to their software components. 
<br/>2. The architecture for some software item is not documented or not properly documented. 
<br/>3. Due to no refinement of the software components, detailed design is made difficult or impossible, by the software architectural design.  
<br/>
<br/><b>2. Development and documentation of a top-level design of the database. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. The documentation fails to provide support regarding particular anomalies with the database. 
<br/>
<br/><b>3. Developement of preliminary versions of the documentations and test requirements, along with the schedule for Software Integration. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. Same as above.   
<br/>
<br/><b>4. Evaluation of the architecture of the software item and the interface and database designs considering various criterion. The results of the evaluation should be properly documented. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The requirements cannot be back-traced from the software item.  
<br/>2. The software item is not externally consistent with the requirements.  
<br/>3. The software items are not internally consistent among themselves.
<br/>4. The detailed design is not feasible on the framework provided by the software architecture. 
<br/>5. The operation and maintenance is not feasible on the detailed design of the software.   
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "archAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
