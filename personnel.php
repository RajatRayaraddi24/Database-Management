<?php 
require_once ('process/dbh.php');
$sql = "SELECT * FROM personnel order by personnel_id";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Personnel | Motorsport Team Management</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>MTM</h1>
			<ul id="navli">
			<li><a class="homeblack" href="aloginwel.php">Home</a></li>
                <li><a class="homered" href="personnel.php">Personnel</a></li>
                <li><a class="homeblack" href="projects.php">Projects</a></li>
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Personnel </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Personnel ID</th>
				<th align = "center">Name</th>
				<th align = "center">Designation</th>
				<th align = "center">Superior ID</th>
                <th align = "center">Birthdate</th>
                <th align = "center">Options</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['personnel_id']."</td>";

					echo "<td>".$employee['firstname']." ".$employee['lastname']."</td>";
					
					echo "<td>".$employee['designation']."</td>";
					
					echo "<td>".$employee['superior_id']."</td>";

                    echo "<td>".$employee['birthdate']."</td>";
					
                    echo "<td><a href=\"editper.php?personnel_id=$employee[personnel_id]\">Edit</a> | <a href=\"deleteper.php?personnel_id=$employee[personnel_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="addemp.php" style="text-decoration: none; color: white"> Add Personnel</button>
		</div>

		
	</div>
</body>
</html>