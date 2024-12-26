<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$Race_ID = $_GET['Race_ID'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM race_schedule WHERE Race_ID=$Race_ID");

//redirecting to the display page (index.php in our case)
header("Location:raceschedule.php");
?>

