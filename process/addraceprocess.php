<?php

require_once ('dbh.php');

$Race_ID = $_POST['Race_ID'];
$Track_Name = $_POST['Track_Name'];
$Race_Date = $_POST['Race_Date'];
$Predicted_Forecast = $_POST['Predicted_Forecast'];

/*$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];*/

$sql = "INSERT INTO `race_schedule`(`Track_Name`, `Race_ID`, `Race_Date`, `Predicted_Forecast`) VALUES ('$Track_Name','$Race_ID','$Race_Date','$Predicted_Forecast')";
$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//raceschedule.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>