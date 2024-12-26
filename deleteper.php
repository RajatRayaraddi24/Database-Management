<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$personnel_id = $_GET['personnel_id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM personnel WHERE personnel_id=$personnel_id");

//redirecting to the display page (index.php in our case)
header("Location:personnel.php");
?>

