<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `finances` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$Transaction_ID = mysqli_real_escape_string($conn, $_POST['Transaction_ID']);
	$Description = mysqli_real_escape_string($conn, $_POST['Description']);
	$Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
	
	$Date = mysqli_real_escape_string($conn, $_POST['Date']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `Part_Name`='$Part_Name',`Amount`='$Amount',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `finances` SET `Description`='$Description',`Amount`='$Amount',`Date`='$Date' WHERE Transaction_ID=$Transaction_ID");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='finances.php';
    </SCRIPT>");


	
}
?>




<?php
	$Transaction_ID = (isset($_GET['Transaction_ID']) ? $_GET['Transaction_ID'] : '');
	$sql = "SELECT * from `finances` WHERE Transaction_ID=$Transaction_ID";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$Description = $res['Description'];
	$Amount = $res['Amount'];
	
	$Transaction_ID = $res['Transaction_ID'];
	$Date = $res['Date'];
	
	
}
}

?>

<html>
<head>
	<title>Edit Finance | Motorsport Team Management</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
	<header>
		<nav>
			<h1>MTM</h1>
			<ul id="navli">
            <li><a class="homeblack" href="aloginwel.php">Home</a></li>
                <li><a class="homeblack" href="finances.php">Finances</a></li>
                <li><a class="homered" href="editfin.php">Edit Finances</a></li>
                <!-- <li><a class="homeblack" href="projects.php">Projects</a></li>
				<li><a class="homeblack" href="finances.php">Finances</a></li>
				<li><a class="homeblack" href="raceschedule.php">Race Schedule</a></li>
                <li><a class="homeblack" href="racereport.php">Race Report</a></li> //-->
				<!-- <li><a class="homeblack" href="addemp.php">Add Projects</a></li>
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
	

		<!-- <form id = "registration" action="edit.php" method="POST"> //-->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Edit Finance Details</h2>
                    <form id = "registration" action="editfin.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="Description" value="<?php echo $Description;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" name="Amount" value="<?php echo $Amount;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="Date" value="<?php echo $Date;?>">
                        </div>
                        
                        
                        <input type="hidden" name="Transaction_ID" id="textField" value="<?php echo $Transaction_ID;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
