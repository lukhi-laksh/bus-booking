<?php

include '../connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `bus` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);



echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Bus Deleted!!!');
    window.location.href='ManagesBuses.php';
    </script>");

?>
