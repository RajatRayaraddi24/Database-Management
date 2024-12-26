<?php 
require_once ('process/dbh.php');
$sql = "SELECT * FROM projects NATURAL JOIN rd_departments order by ProjectNo";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Projects | Motorsport Team Management</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>MTM</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">Home</a></li>
                <li><a class="homeblack" href="personnel.php">Personnel</a></li>
                <li><a class="homered" href="projects.php">Projects</a></li>
				<li><a class="homeblack" href="finances.php">Finances</a></li>
				<li><a class="homeblack" href="raceschedule.php">Race Schedule</a></li>
                <li><a class="homeblack" href="racereport.php">Race Report</a></li>
				<!-- <li><a class="homeblack" href="addemp.php">Add Personnel</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Add Project</a></li>
				<li><a class="homeblack" href="addfinance.php">Add Finance Entry</a></li>
				<li><a class="homeblack" href="addrace.php">Add Race</a></li>
				<li><a class="homeblack" href="addracereport.php">Add Race Report</a></li> -->
				<!--<li><a class="homeblack" href="assignproject.php">Project Status</a></li>//-->
				<!--<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>//-->
				<!--<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>//-->
				<li><a class="homeblack" href="index.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Projects </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Project ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Department Name</th>
				<th align = "center">Impact</th>
				<th align = "center">Expected Date</th>
                <th align = "center">Status</th>
				<th align = "center">Status Change</th>
				<th align = "center">Options</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['ProjectNo']."</td>";

					echo "<td>".$employee['Part_Name']."</td>";
					
					echo "<td>".$employee['Department_Name']."</td>";

					echo "<td>".$employee['Impact']."</td>";
					
					echo "<td>".$employee['Expected_Date']."</td>";

                    echo "<td>".$employee['Status']."</td>";

					echo "<td><a href=\"developing.php?ProjectNo=$employee[ProjectNo]\"  onClick=\"return confirm('Are you sure you want to change status to Developing?')\">Developing</a> | <a href=\"integrated.php?ProjectNo=$employee[ProjectNo]\" onClick=\"return confirm('Are you sure you want to change status to Integrated?')\">Integrated</a></td>";
					
					echo "<td><a href=\"editpro.php?ProjectNo=$employee[ProjectNo]\">Edit</a> | <a href=\"deletepro.php?ProjectNo=$employee[ProjectNo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="assign.php" style="text-decoration: none; color: white"> Add Project</button>
		</div>

		
	</div>
</body>
</html>