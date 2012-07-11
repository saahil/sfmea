<?php
session_start();
?>
<html>
<title>Software Detailed Design</title>
<body>
<h1><center>Software Detailed Design</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Development of a detailed design for each software component of the software item. The software component shall be refined into lower levels containing software units that can be coded, compiled and tested. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. One or more software components can't be broken down into logical module units that can be coded and compiled seperately. 
<br/>2. All software requirements are not allocated from the software components to the software units.  
<br/>3. There is no proper documentation available for the detailed design.   
<br/>
<br/><b>2. Development and documentation of a detailed design for the interfaces external to the software components and between the software components and software units. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. One or more interfaces fail to integrate in the required way with each other, resulting in a loss of data or communication in the channel. 
<br/>2. The inter-communication between the different software modules of the software item fails to implement, due to improper message passing or procedure returns.
<br/>3. The documentation of the detailed design of the interfaces fails to provide, when needed.
<br/>
<br/><b>3. Development and documentation of the detailed design of the database. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The database model does not satisfy the required Normal Form as specified in the system requirement specification. 
<br/>2. There is redundancy of data in the finally designed tables. 
<br/>3. There are not enough attributed for an entity to establish meaningful relations between more than one entity sets. 
<br/>4. Due to the expected large size of the database, the search/query process will imminently take a large amount of time. 
<br/>
<br/><b>4. Definition and documentation of test requirements and schedule for testing software units. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The test requirements don't include stressing the software unit at the limits of its requirements 
<br/>2. Improper documentation for the test requirements, leading to the eventual failure of some parts of the system at the time of testing. 
<br/>
<br/><b>5. Evaluation of the software design and test requirements. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The detailed design is not back traceable to the requirements of the software item. 
<br/>2. The design is not externally consistent with the architectural design.
<br/>3. There is no internal consistency between software componenets and software units. 
<br/>4. The testing process defined by the detailed design process is not feasible at some level. 
<br/>5. The operation and maintenance process is not feasible on the structure defined by the detailed design phase.  
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "detailAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
