<?php 
session_start();
include("connection.php");
include("function.php");

// Check if user is logged in
$user_data = check_login($conn);

// Retrieve ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Check if ID is valid
if (empty($id)) {
    echo "No ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Page</title>
  <link rel="stylesheet" href="cssfile/sidebar.css">
  <link rel="stylesheet" href="cssfile/signUp.css">
  <link rel="stylesheet" href="cssfile/addBooking.css">
  <style>
    .error {
      color: red;
      font-size: 0.9em;
    }
  </style>
  <script>
    function validateForm() {
      const passenger = document.getElementById('passenger_name').value;
      const email = document.getElementById('tel').value;
      const telephone = document.getElementById('telephone').value;
      const alternateNumber = document.getElementById('alternate_telephone').value;

      let valid = true;

      // Clear previous error messages
      document.querySelectorAll('.error').forEach(el => el.textContent = '');

      // Validation checks
      if (!passenger) {
        document.getElementById('passenger_error').textContent = 'Passenger Name is required.';
        valid = false;
      }

      if (!email || !validateGmail(email)) {
        document.getElementById('email_error').textContent = 'Valid Gmail address is required (e.g., example@gmail.com).';
        valid = false;
      }

      if (!telephone || telephone.length !== 10 || !/^\d+$/.test(telephone)) {
        document.getElementById('telephone_error').textContent = 'Telephone must be 10 digits and numeric.';
        valid = false;
      }

      if (!alternateNumber || alternateNumber.length !== 10 || !/^\d+$/.test(alternateNumber)) {
        document.getElementById('alternate_telephone_error').textContent = 'Alternate Telephone must be 10 digits and numeric.';
        valid = false;
      }

      return valid;
    }

    function validateGmail(email) {
      const gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
      return gmailPattern.test(email);
    }
  </script>
</head>
<body>
  <div class="sidebar2">
    <h1 class="adminTopic">Get Your Ticket...</h1>

    <?php
    if (isset($_POST['AddBooking'])) {
      // Retrieve form data
      $passenger = $_POST['passenger_name'];
      $tel = $_POST['tel'];
      $telephone = $_POST['telephone'];
      $alternateNumber = $_POST['alternate_telephone'];

      // Validation check for phone number length
      if (strlen($telephone) === 10 && strlen($alternateNumber) === 10) {
        // Check database connection
        if ($conn->connect_error) {
          die('Connection Failed: ' . $conn->connect_error);
        } else {
          // Prepare SQL statement
          $stmt = $conn->prepare("INSERT INTO booking(passenger_name, telephone, email, alternate_telephone) VALUES (?, ?, ?, ?)");
          if ($stmt) {
            $stmt->bind_param("ssss", $passenger, $telephone, $tel, $alternateNumber);
            $stmt->execute();

            // Redirect to the payment page with ID in the URL
            header("Location: AddPay.php?id=" . urlencode($id)); // Pass the ID to AddPay.php
            exit; // Ensure the script stops after redirect
          } else {
            // Handle SQL prepare statement error
            echo 'Error preparing statement: ' . $conn->error;
          }
        }
        $conn->close();
      }
    }
    ?>

    <!-- Booking Form -->
    <div class="wrapper">
      <div class="registration_form">
        <div class="title">Getting A Ticket...</div>
        <form action="" method="POST" onsubmit="return validateForm();">
          <div class="form_wrap">
            <!-- Include the ID as a hidden field -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="input_wrap">
              <label for="passenger_name">Passenger Name</label>
              <input type="text" id="passenger_name" name="passenger_name" placeholder="Passenger Name">
              <span class="error" id="passenger_error"></span>
            </div>

            <div class="input_wrap">
              <label for="tel">Email</label>
              <input type="text" id="tel" name="tel" placeholder="Email">
              <span class="error" id="email_error"></span>
            </div>

            <div class="input_wrap">
              <label for="telephone">Telephone</label>
              <input type="text" id="telephone" name="telephone" placeholder="Telephone (10 characters)">
              <span class="error" id="telephone_error"></span>
            </div>

            <div class="input_wrap">
              <label for="alternate_telephone">Alternate Telephone</label>
              <input type="text" id="alternate_telephone" name="alternate_telephone" placeholder="Alternate Telephone (10 characters)">
              <span class="error" id="alternate_telephone_error"></span>
            </div>

            <div class="input_wrap">
              <input type="submit" value="Book Now" class="submit_btn" name="AddBooking">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
