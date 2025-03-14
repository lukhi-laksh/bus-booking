<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Sign up page</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/signUp.css">
    <style type="text/css">
      body {
        background-image: url(image/8.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .confirm {
        background-color: transparent;
        margin-top: 5px;
        color: white;
        padding: 10px;
        border-radius: 5px;
      }
      .error {
        color: red;
        font-size: 12px;
      }
    </style>

    <script>
      function validateForm() {
        let isValid = true;
        let firstName = document.getElementById("fname").value;
        let lastName = document.getElementById("lname").value;
        let email = document.getElementById("email").value;
        let username = document.getElementById("uname").value;
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("cpassword").value;

        // Clear previous error messages
        document.querySelectorAll('.error').forEach(e => e.innerHTML = "");

        // First name validation
        if (firstName === "") {
          document.getElementById("fnameError").innerHTML = "First name is required.";
          isValid = false;
        }

        // Last name validation
        if (lastName === "") {
          document.getElementById("lnameError").innerHTML = "Last name is required.";
          isValid = false;
        }

        // Email validation
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === "") {
          document.getElementById("emailError").innerHTML = "Email is required.";
          isValid = false;
        } else if (!emailPattern.test(email)) {
          document.getElementById("emailError").innerHTML = "Please enter a valid email.";
          isValid = false;
        }

        // Username validation
        if (username === "") {
  document.getElementById("unameError").innerHTML = "Username is required.";
  isValid = false;
} else if (/\s/.test(username)) {
  document.getElementById("unameError").innerHTML = "Username cannot contain spaces.";
  isValid = false;
} else {
  document.getElementById("unameError").innerHTML = ""; // Clear the error if no issue
}


        // Password validation
        if (password === "") {
          document.getElementById("passwordError").innerHTML = "Password is required.";
          isValid = false;
        } else if (password.length < 8) {
          document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long.";
          isValid = false;
        }

        // Confirm password validation
        if (confirmPassword === "") {
          document.getElementById("cpasswordError").innerHTML = "Please confirm your password.";
          isValid = false;
        } else if (password !== confirmPassword) {
          document.getElementById("cpasswordError").innerHTML = "Passwords do not match.";
          isValid = false;
        }

        return isValid;
      }
    </script>
  </head>
  <body>
    <?php include("nav.php"); ?>

    <div class="confirm">
      <?php
      include("connection.php");
      include("function.php");

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_pass = $_POST['cpassword'];

        // Validate server-side
        if (!empty($user_name) && !empty($password) && !empty($fname) && !empty($lname) && !empty($email) && !is_numeric($user_name)) {
          if ($password == $con_pass) {
            $checkUserQuery = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";
            $result = mysqli_query($conn, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
              echo "<script>alert('Username already exists. Please choose a different username.');</script>";
            } else {
              $user_id = random_num(20);
              $query = "INSERT INTO users (user_id, First_Name, Last_Name, username, email, password) 
                        VALUES ('$user_id', '$fname', '$lname', '$user_name', '$email', '$password')";
              mysqli_query($conn, $query);

              echo ("<script>
                alert('Successfully signed up!');
                window.location.href='Login.php';
              </script>");
            }
          } else {
            echo "<script>alert('Passwords do not match!');</script>";
          }
        } else {
          echo "<script>alert('Please fill all fields with valid information!');</script>";
        }
      }
      ?>
    </div>

    <div class="wrapper">
      <div class="registration_form">
        <div class="title">Sign Up for NAPSHILA Bus Service</div>
        <form action="#" method="POST" onsubmit="return validateForm()">
          <div class="form_wrap">
            <div class="input_grp">
              <div class="input_wrap">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="First Name">
                <span class="error" id="fnameError"></span>
              </div>
              <div class="input_wrap">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Last Name">
                <span class="error" id="lnameError"></span>
              </div>
            </div>
            <div class="input_wrap">
              <label for="email">Email Address</label>
              <input type="text" id="email" name="email" placeholder="E-mail">
              <span class="error" id="emailError"></span>
            </div>
            <div class="input_wrap">
              <label for="uname">Username</label>
              <input type="text" id="uname" name="user_name" placeholder="Username">
              <span class="error" id="unameError"></span>
            </div>
            <div class="input_wrap">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Password">
              <span class="error" id="passwordError"></span>
            </div>
            <div class="input_wrap">
              <label for="Confirm_password">Confirm Password</label>
              <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
              <span class="error" id="cpasswordError"></span>
            </div>
            <div class="input_wrap">
              <input type="submit" value="Register Now" class="submit_btn">
            </div>
          </div>
          <a href="Login.php" class="login-btn">Login now</a>&nbsp;&nbsp;&nbsp;
        </form>
      </div>
    </div>
  </body>
</html>
