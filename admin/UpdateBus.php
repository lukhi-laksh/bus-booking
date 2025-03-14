<?php 
session_start();
include("../connection.php");

$nameOFbus = '';
$numberPlate = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch existing bus details
    $query = "SELECT * FROM bus WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $bus_data = mysqli_fetch_assoc($result);
        $nameOFbus = $bus_data['Bus_Name'];
        $numberPlate = $bus_data['Bus_NumberPlate'];
    } else {
        echo "<script>alert('Bus not found!'); window.location.href='ManagesBuses.php';</script>";
        exit;
    }
}

if (isset($_POST['BusUpdate'])) {
    $nameOFbus = $_POST['bus_name'];
    $numberPlate = strtoupper($_POST['bus_number_plate']); // Convert to uppercase

    // Validate input
    $errors = [];
    if (empty($nameOFbus)) {
        $errors['bus_name'] = "Bus Name is required.";
    }
    if (empty($numberPlate)) {
        $errors['bus_number_plate'] = "Bus Number Plate is required.";
    }

    // Check if bus number plate is unique
    if (empty($errors)) {
        $query = "SELECT * FROM bus WHERE Bus_NumberPlate = ? AND id != ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $numberPlate, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['bus_number_plate'] = "Bus Number Plate must be unique.";
        }
        
        $stmt->close();
    }

    if (empty($errors)) {
        $query = "UPDATE `bus` SET Bus_Name=?, Bus_NumberPlate=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $nameOFbus, $numberPlate, $id);
        $query_run = $stmt->execute();

        if ($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully Bus updated!!!');
                    window.location.href='ManagesBuses.php';
                  </script>");
        } else {
            echo '<script type="text/javascript">alert("Not Updated!!!")</script>';
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Bus</title>
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
        Buses Update/Edit
      </div>

      <form action="#" method="POST">
        <div class="form_wrap">

          <div class="input_wrap">
            <label for="bus_name">Bus Name</label>
            <input type="text" id="bus_name" name="bus_name" placeholder="Bus Name" value="<?php echo htmlspecialchars($nameOFbus); ?>" >
            <?php if (isset($errors['bus_name'])): ?>
                <div class="error"><?php echo $errors['bus_name']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <label for="bus_number_plate">Bus Number Plate</label>
            <input type="text" id="bus_number_plate" name="bus_number_plate" placeholder="Number Plate" value="<?php echo htmlspecialchars($numberPlate); ?>" oninput="this.value = this.value.toUpperCase();">
            <?php if (isset($errors['bus_number_plate'])): ?>
                <div class="error"><?php echo $errors['bus_number_plate']; ?></div>
            <?php endif; ?>
          </div>

          <div class="input_wrap">
            <input type="submit" value="Update Bus Now" class="submit_btn" name="BusUpdate">
          </div>

        </div>
      </form>
    </div>
  </div>
</body>
</html>
