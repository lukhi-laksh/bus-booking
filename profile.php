<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bus Ticket System - Profile</title>
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <link rel="stylesheet" href="cssfile/profile.css"> <!-- Add a new CSS file for better profile styling -->
</head>
<body>

    <!-- User Greeting -->
    <div class="usern">
        <h2>Hello !!! <?php echo $user_data['username']; ?></h2>
    </div>

    <div class="profile-wrapper">
        <!-- Sidebar with User Image and Navigation -->
        <div class="left-panel">
            <img src="image/Re.png" alt="user" class="profile-pic">
            <button class="btn-upload">Upload Image</button><br><br>
            <a href="viewBus1.php">
                <button class="btn-home">Home</button>
            </a>
        </div>

        <!-- User Account Information -->
        <div class="right-panel">
            <h3>Account Information</h3>
            <hr/>
            <div class="account-info">
                <p><strong>Username:</strong> <?php echo $user_data['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $user_data['email']; ?></p>
                <p><strong>First Name:</strong> <?php echo $user_data['First_Name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user_data['Last_Name']; ?></p>
            </div>

            <!-- Logout and Security Options -->
            <hr/>
            <div class="action-buttons">
                <a href="updateProfile.php?id=<?php echo $user_data['id']; ?>">
                    <button class="btn-action">Update Profile</button>
                </a>
                <a href="logout.php">
                    <button class="btn-action">Logout</button>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
