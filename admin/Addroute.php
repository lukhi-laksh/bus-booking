<?php 
session_start();
include("../connection.php");

$errors = [
    'via_city' => '',
    'destination' => '',
    'bus_name' => '',
    'departure_date' => '',
    'departure_time' => '',
    'cost' => ''
];

// Initialize input values
$via_city = $destination = $bus_name = $dep_date = $dep_time = $cost = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $via_city = trim($_POST['via_city']);
    $destination = trim($_POST['destination']);
    $bus_name = trim($_POST['bus_name']);
    $dep_date = $_POST['departure_date'];
    $dep_time = isset($_POST['departure_time']) ? $_POST['departure_time'] : '';
    $cost = trim($_POST['cost']);
    
    $valid = true;

    // Validation
    if (empty($via_city)) {
        $errors['via_city'] = 'Please enter a via city.';
        $valid = false;
    }
    
    if (empty($destination)) {
        $errors['destination'] = 'Please enter a destination.';
        $valid = false;
    }
    
    if (empty($bus_name)) {
        $errors['bus_name'] = 'Please enter a bus name.';
        $valid = false;
    }

    if (empty($dep_date)) {
        $errors['departure_date'] = 'Please select a departure date.';
        $valid = false;
    }

    if (empty($dep_time) && $dep_date !== date('Y-m-d')) {
        $errors['departure_time'] = 'Please select a departure time.';
        $valid = false;
    }

    if (empty($cost) || !is_numeric($cost)) {
        $errors['cost'] = 'Please enter a valid cost.';
        $valid = false;
    }

    if ($valid) {
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO route(via_city, destination, bus_name, departure_date, departure_time, cost) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("sssssi", $via_city, $destination, $bus_name, $dep_date, $dep_time, $cost);
            $stmt->execute();

            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Route inserted successfully!');
                    window.location.href='manegeRutes.php';
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
            font-size: 0.8em;
        }
    </style>
    <script>
        function validateTime() {
            const dateInput = document.getElementById('departure_date');
            const timeInput = document.getElementById('departure_time');
            const currentDate = new Date();
            const selectedDate = new Date(dateInput.value);
            
            if (selectedDate < currentDate) {
                timeInput.value = '';
                timeInput.disabled = true;
                alert('Please select a valid future date.');
            } else {
                timeInput.disabled = false;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.getElementById('departure_date');
            dateInput.addEventListener('change', validateTime);
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">Routes Adding</div>
            <form action="#" method="POST">
                <div class="form_wrap">
                    <div class="input_wrap">
                        <label for="via_city">Via City</label>
                        <input type="text" id="via_city" name="via_city" placeholder="Via City" value="<?php echo htmlspecialchars($via_city); ?>">
                        <div class="error"><?php echo $errors['via_city']; ?></div>
                    </div>

                    <div class="input_wrap">
                        <label for="destination">Destination</label>
                        <input type="text" id="destination" name="destination" placeholder="Destination" value="<?php echo htmlspecialchars($destination); ?>">
                        <div class="error"><?php echo $errors['destination']; ?></div>
                    </div>

                    <div class="input_wrap">
                        <label for="bus_name">Bus Number</label>
                        <input type="text" id="bus_name" name="bus_name" placeholder="Bus Name" value="<?php echo htmlspecialchars($bus_name); ?>">
                        <div class="error"><?php echo $errors['bus_name']; ?></div>
                    </div>

                    <div class="input_wrap">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" id="departure_date" name="departure_date" class="idclass" value="<?php echo htmlspecialchars($dep_date); ?>">
                        <div class="error"><?php echo $errors['departure_date']; ?></div>
                    </div>

                    <div class="input_wrap">
                        <label for="departure_time">Departure Time</label>
                        <input type="time" id="departure_time" name="departure_time" class="idclass" value="<?php echo htmlspecialchars($dep_time); ?>">
                        <div class="error"><?php echo $errors['departure_time']; ?></div>
                    </div>

                    <div class="input_wrap">
                        <label for="cost">Cost</label>
                        <input type="text" id="cost" name="cost" placeholder="Cost" class="idclass" value="<?php echo htmlspecialchars($cost); ?>">
                        <div class="error"><?php echo $errors['cost']; ?></div>
                    </div>
                    
                    <div class="input_wrap">
                        <input type="submit" value="Add Route Now" class="submit_btn" name="routeAdd">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
