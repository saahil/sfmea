<?php
session_start();
?>
<html>
<title>Process Implementation</title>
<body>
<h1><center>Process Implementation</center></h1><br/>

<br/><h3>Steps involved in the process</h3>
<br/><b>1. Selection of software life cycle model appropriate to the the scope, complexity and magnitude of the project. Activity and tasks of the development process to be selected and mapped onto the life cycle process. </b>
<br/><t/><i>Probable Failure Modes</i>
<br/>1. The model fails to cope up with the complexity of the system, at a certain stage of time in its life cycle.
<br/>2. The chosen model does not fir the complexity requirements of the desired system, to start with.
<br/>
<br/><b>2. Documentation of outputs, configuration management process, problem resolving and supporting procedures.</b>
<br/><i>Probable Failure Modes</i>
<br/>1. The documentation, including the plan, results obtained by the chosed software life cycle model etc. does not reach the concerned management, development or maintenance team, in a proper fashion. 
<br/>2. Configuration specification for a certain component of the software project is not defined or not properly documented.
<br/>
<br/><b>3. Selection and use of those standards, methods, tools and programming language that are documented, appropriate and established by the organization for performing activities of the Development Process. </b>
<br/><i>Probable Failure Modes</i>
<br/>1. Documentation for the selected tools or programming languages not sufficient to carry out the required tasks. 
<br/>2. The required tasks cannot be performed under the limitations of the chosen framework or programming tools.
<br/>
<br/><b>4. Development of plans for ensuring safety and security of the system, including specific standards, methods, tools, actions and responsibility associated with the development and qualification of all the requirements.</b>
<br/><i>Probable Failure Modes</i>
<br/>1. Some part of the system is left vulnerable to some kind of an external attack. 
<br/>2. The security is made too strong for even the authorized users and admins to perform required tasks.
<br/>
<br/>Enter your choice of step and failure mode. We shall add it to the database with their corresponding values of Severity, Occurence and Detection(if any). 
<br/><form action = "procAdd.php?<?php echo htmlspecialchars(SID); ?>" method = "post">
<br/>Step no.         <input type = "text" name = "step"/>
<br/>Failure mode no. <input type = "text" name = "fMode"/>
<br/><input type = "submit" value = "Submit"/>
</form>
</body>
</html>
