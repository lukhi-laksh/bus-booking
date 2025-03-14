<?php 
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Received</title>

  <link rel="stylesheet" href="cssfile/sidebar.css">
  <style type="text/css">
    body {
      background-image: url("image/20.jpg");
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

    table {
      width: 99%;
      border-collapse: separate !important;
      margin: 50px auto;
      text-align: center;
      background-color: rgb(255, 255, 255);
      border-radius: 10px 10px 0 0;
    }

    table th {
      border-bottom: 2px solid rgb(187, 187, 187);
      padding: 10px 0;
      font-family: "balsamiq_sansitalic" !important;
    }

    table td {
      border-right: 2px solid rgb(187, 187, 187);
      height: 58px;
      padding: 22px 0 0;
      font-family: "monospace" !important;
      border-bottom: 2px solid rgb(187, 187, 187);
      font-size: 20px; /* Font size increased to 20px */
    }

    table td a {
      color: white;
      border-radius: 5px;
      padding: 6px;
      text-decoration: none;
      margin: 10px;
      font-weight: 700;
    }

    table td button:hover {
      padding: 5px;
      border: 2px solid yellow;
      border-radius: 7px;
      background-color: red;
      color: white;
      cursor: pointer;
    }

    button {
      padding: 5px;
    }

    .btnPolicy {
      padding: 5px;
      border: 2px solid yellow;
      border-radius: 7px;
      background-color: red;
      color: white;
      margin-left: 20px;
    }

    .btnPolicy:hover {
      background: red;
      padding: 7px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <input type="checkbox" id="check">
  <label for="check">
    <i class="fa fa-bars" id="btn"></i>
    <i class="fa fa-times" id="cancle"></i>
  </label>
  <div class="sidebar">
    <header>
      <img src="image/Re.png">
      <p><?php echo $_SESSION['username']; ?></p>
    </header>
    <ul>
    <li><a href="adminDash.php">Dashboard</a></li>
      <li><a href="adminDash.php">Manage Routes</a></li>
      <li><a href="ManagesBuses.php">Manage Buses</a></li>
      <li><a href="BookingManage.php">Booking People</a></li>
      <li><a href="PaymentManage.php">Transaction</a></li>
      <li><a href="adminLogout.php">Logout</a></li>
    </ul>
  </div>

  <div class="sidebar2">
    <h1 class="adminTopic">Transaction Received...</h1>

    <?php
      $sqlget = "SELECT * FROM payment";
      $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

      echo "<table>";
      echo "<tr>
        <th>ID</th>
        <th>Paid Amount</th>
        <th>Paid Passenger Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Update/Edit</th>
        <th>Delete</th>
      </tr>";

      while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
        echo "<tr><td>";
        echo $row['id'];
        echo "</td><td>";
        echo $row['amount'];
        echo "</td><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>";
        echo $row['address'];
        echo "</td><td>";
        echo $row['city'];
        echo "</td>";
    ?>

    <td>
      <button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">
        <a href="updateTransactionReceived.php?id=<?php echo $row['id']; ?>">Update</a>
      </button>
    </td>
    <td>
      <button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">
        <a href="deleteTransactionReceived.php?id=<?php echo $row['id']; ?>">Delete</a>
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
