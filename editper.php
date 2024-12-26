<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `personnel` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$personnel_id = mysqli_real_escape_string($conn, $_POST['personnel_id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
	$superior_id = mysqli_real_escape_string($conn, $_POST['superior_id']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `personnel` SET `firstname`='$firstname',`lastname`='$lastname',`birthdate`='$birthdate',`superior_id`='$superior_id',`designation`='$designation' WHERE personnel_id=$personnel_id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='personnel.php';
    </SCRIPT>");


	
}
?>




<?php
	$personnel_id = (isset($_GET['personnel_id']) ? $_GET['personnel_id'] : '');
	$sql = "SELECT * from `personnel` WHERE personnel_id=$personnel_id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$firstname = $res['firstname'];
	$lastname = $res['lastname'];
	$birthdate = $res['birthdate'];
	$personnel_id = $res['personnel_id'];
	$designation = $res['designation'];
	$superior_id = $res['superior_id'];
	
}
}

?>

<html>
<head>
	<title>Edit Personnel | Motorsport Team Management</title>
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
                <li><a class="homeblack" href="personnel.php">Personnel</a></li>
                <li><a class="homered" href="editper.php">Edit Personnel</a></li>
                <!-- <li><a class="homeblack" href="projects.php">Projects</a></li>
				<li><a class="homeblack" href="finances.php">Finances</a></li>
				<li><a class="homeblack" href="raceschedule.php">Race Schedule</a></li>
                <li><a class="homeblack" href="racereport.php">Race Report</a></li> //-->
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
	

		<!-- <form id = "registration" action="edit.php" method="POST"> //-->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Edit Personnel Details</h2>
                    <form id = "registration" action="editper.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="firstname" value="<?php echo $firstname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="lastname" value="<?php echo $lastname;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="designation" value="<?php echo $designation;?>">
                        </div>
                        
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" name="superior_id" value="<?php echo $superior_id;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="birthdate" value="<?php echo $birthdate;?>">
                        
                        <input type="hidden" name="personnel_id" id="textField" value="<?php echo $personnel_id;?>" required="required"><br><br>
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
