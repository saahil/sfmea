<?php
session_start();
?>
<html>
<title>Phases of development</title>
<body>
<h2>Select the phase of development</h2>
<br/><a href = "procImplement.php?<?php echo htmlspecialchars(SID); ?>">1. Process Implementation</a>
<br/><a href = "reqAnalysis.php?<?php echo htmlspecialchars(SID); ?>">2. Software Requirement Analysis</a>
<br/><a href = "archDesign.php?<?php echo htmlspecialchars(SID); ?>">3. Software Architectural Design</a>
<br/><a href = "detailDesign.php?<?php echo htmlspecialchars(SID); ?>">4. Software Detailed Design</a>
<br/><a href = "codeTesting.php?<?php echo htmlspecialchars(SID); ?>">5. Software Coding and Testing</a>
<br/><a href = "integration.php?<?php echo htmlspecialchars(SID); ?>">6. System and Software Integration</a>
<br/><a href = "qualification.php?<?php echo htmlspecialchars(SID); ?>">7. Software and System Qualification Testing</a>
<br/><a href = "installation.php?<?php echo htmlspecialchars(SID); ?>">8. Software Installation</a>
<br/><a href = "support.php?<?php echo htmlspecialchars(SID); ?>">9. Software Acceptance and Support</a>
</body>
</html>
