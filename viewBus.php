<?php 
session_start();

require_once("connection.php");
require_once("function.php");

$user_data = check_login($conn);
?>

<?php require_once("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Ticket Booking</title>
  <link rel="stylesheet" href="cssfile/viewBus.css">
  <link rel="stylesheet" href="cssfile/sidebar.css">
</head>
<body>
<?php include("nav.php"); ?>
  <div class="sidebar2">
    <h1 class="adminTopic">Booking Your Ticket...</h1>

    <?php
      $query = "SELECT * FROM route";
      $result = mysqli_query($conn, $query) or die('Error retrieving data');

      echo "<table>";
      echo "<tr>
              <th>Via City</th>
              <th>Destination</th>
              <th>Bus Name</th>
              <th>Departure Date</th>
              <th>Departure Time</th>
              <th>Cost</th>
              <th>Booking</th>
            </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['via_city']}</td>";
        echo "<td>{$row['destination']}</td>";
        echo "<td>{$row['bus_name']}</td>";
        echo "<td>{$row['departure_date']}</td>";
        echo "<td>{$row['departure_time']}</td>";
        echo "<td>{$row['cost']}</td>";
    ?>
        <td>
          <button style="border: 2px solid yellow; border-radius: 7px; background-color: red; color: white;">
            <a href="Login.php?id=<?php echo $row['id']; ?>" style="color: white; text-decoration: none;">Book Now</a>
          </button>
        </td>
      </tr>
    <?php
      }
      echo "</table>";
    ?>
  </div>
</body>
</html>
