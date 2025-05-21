<?php
require_once ('init/db-connection.php');

if ($_POST){

    $Phone=$_POST['phone_number'];
    $F_Name=$_POST['first_name'];
    $L_Name=$_POST['last_name'];
    $T_Center=$_POST['test_center'];
    $T_Date=$_POST['test_date'];
    $S_Date=$_POST['start_date'];
    $E_Date=$_POST['end_date'];

    $sql = "INSERT INTO infections VALUES (NULL, '$Phone', '$F_Name', '$L_Name', '$T_Center', '$T_Date', '$S_Date', '$E_Date')";
    $result = $conn->query($sql);
    if ($result){
        $successMsg = "Infectee has been added to the database. Thanks you for reporting.";
        header("refresh:2;url=index.php");
    } else {
        $errMsg = $conn->error;
    }
}

?>