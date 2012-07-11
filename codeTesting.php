<?php
session_start();
?>
<html>
<title>Software Coding and Testing</title>
<body>
<h1><center>Software Coding and Testing</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Development of each software unit and database. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. Possible system errors resulting in termination of the development process in incomplete stages.  
<br/>2. The database server located on a remote system fails, even though the local client machine is up and running.   
<br/>
<br/><b>2. Testing of each software unit and database to ensure that it satisfies its requirements. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. Upon testing, the software modules or database give incorrigible results, for a given set of test data. 
<br/>2. The software modules or database, don't give any results at all, for a given set of test data.
<br/>3. The software modules or database fail at some load limit or input size, and start behaving in an inappropriate manner.
<br/>
<br/><b>3. Evaluation of software code and test results, and its documentation. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The software item is not back-traceable to the requirements of the system. 
<br/>2. The software item is inconsistent with the requirements.  
<br/>3. There are internal inconsistencies between the unit requirements. 
<br/>4. Software integration and testing are not feasible, based on the final item design.
<br/>5. Operation and maintenance are not feasible, based on the final item design.  
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "codeAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
