<?php 
session_start();
include("../connection.php");

// Check if 'id' is set in the URL
if (!isset($_GET['id'])) {
    echo "<script>
            alert('ID not provided!');
            window.location.href='manegeRutes.php'; // Redirect to your desired page
          </script>";
    exit;
}

$id = $_GET['id'];

// Fetch existing data for the route
$route_query = "SELECT * FROM route WHERE id=$id";
$route_result = mysqli_query($conn, $route_query);
$route_data = mysqli_fetch_assoc($route_result);

// Initialize variables with existing data
$via_city = $route_data['Via_city'] ?? '';
$destination = $route_data['destination'] ?? '';
$bus_name = $route_data['bus_name'] ?? '';
$dep_date = $route_data['departure_date'] ?? '';
$dep_time = $route_data['departure_time'] ?? '';
$cost = $route_data['cost'] ?? '';

$errors = [];

if (isset($_POST['routeUpdate'])) {
    $via_city = $_POST['Via_city'];
    $destination = $_POST['destination'];
    $bus_name = $_POST['bus_name'];
    $dep_date = $_POST['departure_date'];
    $dep_time = $_POST['departure_time'] ?? '';
    $cost = $_POST['cost'];

    // Validate input
    if (empty($via_city)) {
        $errors['via_city'] = "Via City is required.";
    }
    if (empty($destination)) {
        $errors['destination'] = "Destination is required.";
    }
    if (empty($bus_name)) {
        $errors['bus_name'] = "Bus Name is required.";
    }
    if (empty($dep_date)) {
        $errors['departure_date'] = "Departure Date is required.";
    }
    if (empty($dep_time)) {
        $errors['departure_time'] = "Departure Time is required.";
    }
    if (empty($cost)) {
        $errors['cost'] = "Cost is required.";
    }

    // Check if the selected date and time are in the past
    $selected_datetime = strtotime("$dep_date $dep_time");
    $current_datetime = time();
    if ($selected_datetime < $current_datetime) {
        $errors['departure_time'] = "Departure date and time cannot be in the past.";
    }

    if (empty($errors)) {
        $query = "UPDATE `route` SET Via_city='$via_city', destination='$destination', bus_name='$bus_name', departure_date='$dep_date', departure_time='$dep_time', cost='$cost' WHERE id=$id";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo "<script>
                    alert('Route updated successfully!');
                    window.location.href='manegeRutes.php';
                  </script>";
        } else {
            echo '<script>alert("Route not updated!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel Suraksha</title>
  <link rel="stylesheet" href="../cssfile/signUp.css">
  <style>
    body {
      background-image: url("../image/20.jpg");
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .adminTopic {
      text-align: center;
      color: #fff;
      margin-top: 20px;
      font-size: 24px;
    }
    .form_wrap {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form_wrap .input_wrap {
      margin-bottom: 15px;
    }
    .form_wrap label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }
    .form_wrap input {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: #333;
    }
    .form_wrap .submit_btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }
    .form_wrap .submit_btn:hover {
      background-color: #0056b3;
    }
    .error {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="form_wrap">
    <div class="adminTopic">Bus Route Update/Edit</div>
    
    <form action="#" method="POST">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
      
      <div class="input_wrap">
        <label for="Via_city">Via City</label>
        <input type="text" id="Via_city" name="Via_city" placeholder="Via City" value="<?php echo htmlspecialchars($via_city); ?>">
        <?php if (isset($errors['via_city'])): ?>
            <div class="error"><?php echo $errors['via_city']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <label for="destination">Destination</label>
        <input type="text" id="destination" name="destination" placeholder="Destination" value="<?php echo htmlspecialchars($destination); ?>">
        <?php if (isset($errors['destination'])): ?>
            <div class="error"><?php echo $errors['destination']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <label for="bus_name">Bus Number</label>
        <input type="text" id="bus_name" name="bus_name" placeholder="Bus Number" value="<?php echo htmlspecialchars($bus_name); ?>">
        <?php if (isset($errors['bus_name'])): ?>
            <div class="error"><?php echo $errors['bus_name']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <label for="departure_date">Departure Date</label>
        <input type="date" id="departure_date" name="departure_date" value="<?php echo htmlspecialchars($dep_date); ?>">
        <?php if (isset($errors['departure_date'])): ?>
            <div class="error"><?php echo $errors['departure_date']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <label for="departure_time">Departure Time</label>
        <input type="time" id="departure_time" name="departure_time" value="<?php echo htmlspecialchars($dep_time); ?>">
        <?php if (isset($errors['departure_time'])): ?>
            <div class="error"><?php echo $errors['departure_time']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <label for="cost">Cost</label>
        <input type="number" id="cost" name="cost" placeholder="Cost" value="<?php echo htmlspecialchars($cost); ?>">
        <?php if (isset($errors['cost'])): ?>
            <div class="error"><?php echo $errors['cost']; ?></div>
        <?php endif; ?>
      </div>
      <div class="input_wrap">
        <input type="submit" value="Update Route Now" class="submit_btn" name="routeUpdate">
      </div>
    </form>
  </div>
</body>
</html>
