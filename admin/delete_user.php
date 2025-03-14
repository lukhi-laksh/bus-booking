<?php
session_start();
include("../connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];

    // Validate the user ID
    if (!empty($user_id)) {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('User deleted successfully!'); window.location.href='UsarManage.php';</script>";
        } else {
            echo "<script>alert('Error deleting user.'); window.location.href='UsarManage.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID.'); window.location.href='admin.php';</script>";
    }
}
?>
