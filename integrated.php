<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$ProjectNo = $_GET['ProjectNo'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE `projects` SET `Status`='Integrated' WHERE `ProjectNo`=$ProjectNo");

//redirecting to the display page (index.php in our case)
header("Location:projects.php");
?>