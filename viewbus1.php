<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);
?>

<?php include("connection.php") ?>

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
<?php include("nav1.php"); ?>
  <div class="sidebar2">
    <h1 class="adminTopic">Booking Your Ticket...</h1>

    <?php
      $sqlget = "SELECT * FROM route";
      $sqldata = mysqli_query($conn, $sqlget) or die('Error getting data');

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

      while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
        echo "<td>" . $row['via_city'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "<td>" . $row['bus_name'] . "</td>";
        echo "<td>" . $row['departure_date'] . "</td>";
        echo "<td>" . $row['departure_time'] . "</td>";
        echo "<td>" . $row['cost'] . "</td>";
    ?>
        <td>
          <button style="border: 2px solid yellow; border-radius: 7px; background-color: red; color: white;">
          <a href="AddBooking.php?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>">Book Now</a>
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
