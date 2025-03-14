<?php 
session_start();
include("../connection.php");

$errors = [];

if (isset($_POST['AddBus'])) {
    $nameOFbus = $_POST['bus_name'];
    $busNumberPlate = strtoupper($_POST['bus_numberplate']); // Convert to uppercase

    // Validate input
    if (empty($nameOFbus)) {
        $errors['bus_name'] = "Bus Name is required.";
    }
    if (empty($busNumberPlate)) {
        $errors['bus_numberplate'] = "Bus Number Plate is required.";
    }

    // Check if bus number plate is unique
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * FROM bus WHERE Bus_NumberPlate = ?");
        $stmt->bind_param("s", $busNumberPlate);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['bus_numberplate'] = "Bus Number Plate must be unique.";
        }

        $stmt->close();
    }

    if (empty($errors)) {
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO bus(Bus_Name, Bus_NumberPlate) VALUES(?, ?)");
            $stmt->bind_param("ss", $nameOFbus, $busNumberPlate);
            $stmt->execute();
            
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully Bus Added!!!');
                    window.location.href='ManagesBuses.php';
                  </script>");
            
            $stmt->close();
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Routes Adding</title>
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
        Bus Adding
      </div>

      <form action="#" method="POST">
        <div class="form_wrap">
          
          <div class="input_wrap">
            <label for="bus_name">Bus Name</label>
            <input type="text" id="bus_name" name="bus_name" placeholder="Bus Name" >
            <?php if (isset($errors['bus_name'])): ?>
                <div class="error"><?php echo $errors['bus_name']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <label for="bus_numberplate">Bus Number Plate :</label>
            <input type="text" id="bus_numberplate" name="bus_numberplate" placeholder="Bus Number Plate" oninput="this.value = this.value.toUpperCase();">
            <?php if (isset($errors['bus_numberplate'])): ?>
                <div class="error"><?php echo $errors['bus_numberplate']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <input type="submit" value="Add Bus Now" class="submit_btn" name="AddBus">
          </div>

        </div>
      </form>
    </div>
  </div>
</body>
</html>
