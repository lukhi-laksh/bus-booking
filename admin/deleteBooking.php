<?php

include '../connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `booking` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);



echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Booking Deleted!!!');
    window.location.href='BookingManage.php';
    </script>");

?>
