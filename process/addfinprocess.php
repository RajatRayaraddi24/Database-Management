<?php

require_once ('dbh.php');

$Transaction_ID = $_POST['Transaction_ID'];
$Description = $_POST['Description'];
$Amount = $_POST['Amount'];
//$Current_Balance = $_POST['Current_Balance'];
$Date = $_POST['Date'];

/*$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];*/

$sql = "INSERT INTO `finances`(`Transaction_ID`, `Description`, `Amount`, `Incharge_ID`, `Date`) VALUES ('$Transaction_ID','$Description','$Amount',NULL,'$Date')";
$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//finances.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>