<?php 
session_start();
include("connection.php");

if(isset($_POST['updateprofile'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['user_name']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password)) {
        echo '<script type="text/javascript">alert("All fields are required!");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/javascript">alert("Invalid email format!");</script>';
    } else {
        $query = "UPDATE `users` SET First_Name='$fname', Last_Name='$lname', email='$email', username='$username', password='$password' WHERE id='{$_SESSION['user_id']}'"; // Assuming user ID is stored in session
        
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully your profile updated!!!');
                window.location.href='profile.php';
                </script>");
        } else {
            echo '<script type="text/javascript">alert("Profile not updated!!!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Suraksha Insurance Solutions</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/signUp.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
        body {
            background-image: url(image/10.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .confirm {
            background-color: black;
            margin-top: 5px;
        }
        .form_wrap .input_grp input[type="number"] {
            width: 165px;
        }
        .form_wrap input[type="number"] {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #9597a6;
            padding: 10px;
            outline: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">
                Update Your Sarthi Profile
            </div>
            <form action="#" method="POST">
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="First Name" >
                        </div>
                        <div class="input_wrap">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Last Name" >
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="E-mail" >
                    </div>
                    <div class="input_wrap">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="user_name" placeholder="Username" >
                    </div>
                    <div class="input_wrap">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="password" >
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Update Now" class="submit_btn" name="updateprofile">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
