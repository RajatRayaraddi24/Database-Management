<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
//$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Home | Motorsport Team Management</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>MTM</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">Home</a></li>
                <li><a class="homeblack" href="personnel.php">Personnel</a></li>
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Welcome back, Admin! </h2>
    	<!-- <table>

			<tr bgcolor="#000">
				<th align = "center">Seq.</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Points</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['points']."</td>";
					
					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div>// -->

		
	</div>
</body>
</html>