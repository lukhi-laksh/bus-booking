<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contact_messages WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: userContect.php");
        exit();
    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request";
}
?>
