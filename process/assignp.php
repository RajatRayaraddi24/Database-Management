<?php

require_once ('dbh.php');

$Project_No = $_POST['ProjectNo'];
$Department_ID = $_POST['Department_ID'];
$Impact = $_POST['Impact'];
$Part_Name = $_POST['Part_Name'];
$Expected_Date = $_POST['Expected_Date'];
/*$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];*/

$sql = "INSERT INTO `projects`(`Part_Name`, `ProjectNo`, `Department_ID`, `Status`, `Expected_Date`,`Impact`) VALUES ('$Part_Name','$Project_No',$Department_ID,'Pending','$Expected_Date','$Impact')";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//projects.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>