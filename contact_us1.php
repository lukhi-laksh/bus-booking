<?php
session_start(); // Start the session to access session data

include('connection.php'); // Database connection
include('function.php'); // Ensure user is logged in

$user_data = check_login($conn); // Retrieve logged-in user data
$feedback = "";
$phone_error = $message_error = ""; // Initialize error variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

    // Validation
    if (empty($phone)) {
        $phone_error = "Please enter your phone number.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) { // Ensure the phone number is exactly 10 digits
        $phone_error = "Invalid phone number. It must be exactly 10 digits.";
    }

    if (empty($message)) {
        $message_error = "Please enter your message.";
    }

    if (empty($phone_error) && empty($message_error)) {
        $name = $user_data['username'];
        $email = $user_data['email'];

        // Insert message into the database
        $query = "INSERT INTO contact_messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

        if (mysqli_query($conn, $query)) {
            $feedback = "<p style='color: green;'>Message sent successfully!</p>";
        } else {
            $feedback = "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/contact_us.css">
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
            line-height: 1.5;
            box-sizing: border-box;
            color: rgba(248, 248, 248, 0.938);
            background-image: url(image/20.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>

    <?php include("nav1.php"); ?>

    <section id="fancy-form">
        <div class="container">
            <div class="form-sections">
                <div class="Form-left">
                    <h1>Get In Touch</h1>
                    <div class="line"></div>
                    <p>Contact us for latest news and updates. Subscribe to our newsletter :)</p><br>

                    <h4>ADDRESS</h4>
                    <span>123, Main Street, New York 1001</span>
                    <hr><br><br>

                    <h4>PHONE</h4>
                    <span>(+91)99586 24586</span>
                    <hr><br><br>

                    <h4>EMAIL</h4>
                    <span>sarthi04@gmail.com</span>
                    <hr><br>
                </div>

                <div class="Form-right">
                    <h1>Contact Us</h1>
                    <div class="line"></div>
                    <form action="" method="post">
                        <h5>NAME</h5>
                        <!-- Pre-fill the name field with readonly attribute -->
                        <input type="text" name="name" value="<?php echo isset($user_data['username']) ? $user_data['username'] : ''; ?>" readonly><br><br>

                        <h5>EMAIL</h5>
                        <!-- Pre-fill the email field with readonly attribute -->
                        <input type="email" name="email" value="<?php echo isset($user_data['email']) ? $user_data['email'] : ''; ?>" readonly><br><br>

                        <h5>PHONE</h5>
                        <input type="tel" name="phone" placeholder="Enter your phone number" >
                        <!-- Display phone error message below the field -->
                        <p style="color: red;"><?php echo $phone_error; ?></p><br>

                        <h5>YOUR MESSAGE</h5>
                        <textarea name="message" cols="50" rows="7" placeholder="Enter your message" ></textarea>
                        <!-- Display message error message below the field -->
                        <p style="color: red;"><?php echo $message_error; ?></p><br>

                        <button type="submit">Send</button>
                    </form>
                    <?php echo $feedback; ?>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
