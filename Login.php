<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>NAPSHILA Login</title>
    <script type="text/javascript">
        // Disable back button after login
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () {
            null;
        };
    </script>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="cssfile/login.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-image: url(image/8.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .sign_up {
            font-size: 20px;
        }

        .sign_up:hover {
            background-color: #fff;
        }
    </style>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <?php include("nav.php"); ?>
    <?php include("connection.php"); ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            // Query to check if the user exists
            $userQuery = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            $userResult = mysqli_query($conn, $userQuery);

            if ($userResult && mysqli_num_rows($userResult) > 0) {
                $userData = mysqli_fetch_assoc($userResult);
                
                // Validate user password
                if ($userData['password'] === $password) {
                    $_SESSION['user_id'] = $userData['user_id'];
                    header("Location: Home1.php"); // Redirect to user's main home page
                    die;
                } else {
                    echo '<script type="text/javascript">alert("Incorrect Password!")</script>';
                }

            } else {
                echo '<script type="text/javascript">alert("Username not found!")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Please fill in all fields!")</script>';
        }
    }
    ?>

    <div class="login-box">
        <img src="image/avatar.png" class="avatar" alt="Avatar">
        <h1>Login For NAPSHILA</h1>
        <form method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
            <a href="signUp.php">Sign up Now</a>&nbsp;&nbsp;&nbsp;
        </form>
    </div>

</body>
</html>
