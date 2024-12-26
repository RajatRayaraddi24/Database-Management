<?php 
require_once ('process/dbh.php');
$sql = "SELECT * FROM race_report NATURAL JOIN race_schedule order by Race_ID";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Race Report | Motorsport Team Management</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>MTM</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">Home</a></li>
                <li><a class="homeblack" href="personnel.php">Personnel</a></li>
                <li><a class="homeblack" href="projects.php">Projects</a></li>
				<li><a class="homeblack" href="finances.php">Finances</a></li>
				<li><a class="homeblack" href="raceschedule.php">Race Schedule</a></li>
                <li><a class="homered" href="racereport.php">Race Report</a></li>
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Race Report </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Race ID</th>
				<th align = "center">Race Name</th>
                <th align = "center">Track</th>
				<th align = "center">Driver 1 Position</th>
				<th align = "center">Driver 2 Position</th>
				<th align = "center">Options</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['Race_ID']."</td>";

					echo "<td>".$employee['Race_Name']."</td>";
					
					echo "<td>".$employee['Track_Name']."</td>";
					
					echo "<td>".$employee['Driver_1_Position']."</td>";

                    echo "<td>".$employee['Driver_2_Position']."</td>";

					echo "<td><a href=\"editrar.php?Race_ID=$employee[Race_ID]\">Edit</a> | <a href=\"deleterar.php?Race_ID=$employee[Race_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
					
					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="addracereport.php" style="text-decoration: none; color: white"> Add Race Report</button>
		</div>

		
	</div>
</body>
</html>