<?php 
session_start();
include("../connection.php");

$passenger = '';
$email = '';
$tel = '';
$alt_tel = '';
$errors = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing booking details
    $query = "SELECT * FROM booking WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $booking_data = mysqli_fetch_assoc($result);
        $passenger = $booking_data['passenger_name'];
        $email = $booking_data['email'];
        $tel = $booking_data['telephone'];
        $alt_tel = $booking_data['alternate_telephone']; // Adjust field name as necessary
    } else {
        echo "<script>alert('Booking not found!'); window.location.href='BookingManage.php';</script>";
        exit;
    }
}

if (isset($_POST['updateBooking'])) {
    $id = $_POST['id'];  
    $passenger = $_POST['passenger_name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $alt_tel = $_POST['alternate_tel'];

    // Validate input
    if (empty($passenger)) {
        $errors['passenger_name'] = "Passenger Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid Email is required.";
    }
    if (empty($tel)) {
        $errors['tel'] = "Telephone number is required.";
    } elseif (strlen($tel) != 10 || !is_numeric($tel)) {
        $errors['tel'] = "Telephone number must be 10 digits.";
    }
    if (empty($alt_tel)) {
        $errors['alternate_tel'] = "Alternate Telephone number is required.";
    } elseif (strlen($alt_tel) != 10 || !is_numeric($alt_tel)) {
        $errors['alternate_tel'] = "Alternate Telephone number must be 10 digits.";
    }

    if (empty($errors)) {
        $query = "UPDATE `booking` SET passenger_name='$passenger', telephone='$tel', email='$email', alternate_telephone='$alt_tel' WHERE id=$id";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully Booking Updated!!!');
                    window.location.href='BookingManage.php';
                    </script>");
        } else {
            echo '<script type="text/javascript">alert("Booking not updated!!!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking View</title>
  <link rel="stylesheet" href="../cssfile/signUp.css">
  <style type="text/css">
    body {
      background-image: url("../image/20.jpg");
      background-position: center;
      background-size: cover;
      height: 700px;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .adminTopic {
      text-align: center;
      color: #fff;
    }
    .form_wrap .submit_btn:hover {
      color: #fff;
      font-weight: 600;
    }
    .idclass {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;
    }
    .error {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="registration_form">
      <div class="title">
        Update Passenger Booking...
      </div>

      <form action="#" method="POST">
        <div class="form_wrap">

          <div class="input_wrap">
            <label for="passenger_name">Passenger Name</label>
            <input type="text" id="passenger_name" name="passenger_name" placeholder="Passenger Name" value="<?php echo htmlspecialchars($passenger); ?>" required>
            <?php if (isset($errors['passenger_name'])): ?>
                <div class="error"><?php echo $errors['passenger_name']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($email); ?>" required>
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <label for="tel">Telephone</label>
            <input type="text" id="tel" name="tel" placeholder="Telephone" value="<?php echo htmlspecialchars($tel); ?>" required>
            <?php if (isset($errors['tel'])): ?>
                <div class="error"><?php echo $errors['tel']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <label for="alternate_tel">Alternate Telephone</label>
            <input type="text" id="alternate_tel" name="alternate_tel" placeholder="Alternate Telephone" value="<?php echo htmlspecialchars($alt_tel); ?>" required>
            <?php if (isset($errors['alternate_tel'])): ?>
                <div class="error"><?php echo $errors['alternate_tel']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="submit" value="Update Now" class="submit_btn" name="updateBooking">
          </div>

        </div>
      </form>
    </div>
  </div>
</body>
</html>
