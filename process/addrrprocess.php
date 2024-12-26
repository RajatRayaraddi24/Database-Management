<?php

require_once ('dbh.php');

$Race_ID = $_POST['Race_ID'];
$Race_Name = $_POST['Race_Name'];
//$Track = $_POST['Track'];
$Driver_1_Position = $_POST['Driver_1_Position'];
$Driver_2_Position = $_POST['Driver_2_Position'];

/*$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];*/

$sql = "INSERT INTO `race_report`(`Race_ID`, `Race_Name`, `Driver_1_Position`, `Driver_2_Position`, `Incharge_ID`) VALUES ('$Race_ID','$Race_Name','$Driver_1_Position','$Driver_2_Position',NULL)";
$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//racereport.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>