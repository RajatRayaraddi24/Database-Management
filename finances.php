<?php 
require_once ('process/dbh.php');
$sql = "SELECT * FROM finances order by Date";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Finances | Motorsport Team Management</title>
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
				<li><a class="homered" href="finances.php">Finances</a></li>
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Finances </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Transaction ID</th>
				<th align = "center">Description</th>
                <th align = "center">Amount</th>
				<!-- <th align = "center">Current Balance</th> //-->
				<th align = "center">Date</th>
				<th align = "center">Options</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['Transaction_ID']."</td>";

					echo "<td>".$employee['Description']."</td>";
					
					echo "<td>".$employee['Amount']."</td>";
					
					// echo "<td>".$employee['Current_Balance']."</td>";

                    echo "<td>".$employee['Date']."</td>";

					echo "<td><a href=\"editfin.php?Transaction_ID=$employee[Transaction_ID]\">Edit</a> | <a href=\"deletefin.php?Transaction_ID=$employee[Transaction_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="addfinance.php" style="text-decoration: none; color: white"> Add Finance Entry</button>
		</div>

		
	</div>
</body>
</html>