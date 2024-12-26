<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$Transaction_ID = $_GET['Transaction_ID'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM finances WHERE Transaction_ID=$Transaction_ID");

//redirecting to the display page (index.php in our case)
header("Location:finances.php");
?>

