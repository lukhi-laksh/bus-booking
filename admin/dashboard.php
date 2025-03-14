<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../cssfile/dashboard.css">
</head>
<body>
  
  <?php include('../Connection/connection.php') ?>
  <?php include('header.php') ?>
  <?php include('sidebar.php') ?>
      
      <!-- Dashboard Header -->
      <div class="dashboard-header">
        <div class="dashboard-container">
          <div class="dashboard-row dashboard-mb-2">
            <div class="dashboard-col-left">
              <h1 class="dashboard-title">Dashboard</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /.dashboard-header -->
      
      <!-- Main Dashboard Content -->
      <section class="dashboard-content">
        <div class="dashboard-container">
          <!-- Dashboard Info Boxes -->
          <div class="dashboard-row">
            <div class="dashboard-col-3">
              <div class="info-card">
                <img src="../image/money.png" id="first" class="info-card-image">
                <span class="info-card-icon info-bg-primary"><i class="fas fa-graduation-cap"></i></span>
                <div class="info-card-content">
                  <span class="info-card-label">Total Routes</span>
                   <?php
                                $sqlget = "SELECT * FROM route";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching routes');
                                $count = 0;
                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                    $count = $count + 1; 
                                }
                                echo "<span class='info-card-number'>$count</span>";
                            ?>
                </div>
              </div>
            </div>

            <div class="dashboard-col-3">
              <div class="info-card">
                <img src="../image/money.png" class="info-card-image">
                <span class="info-card-icon info-bg-danger"><i class="fas fa-users"></i></span>
                <div class="info-card-content">
                  <span class="info-card-label">Total Buses</span>
                  <?php
                                $sqlget = "SELECT * FROM bus";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');
                                $count = 0;
                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                  $count = $count + 1; 
                                }
                                echo "<span class='info-card-number'>$count</span>";
                            ?>
                </div>
              </div>
            </div>

            <div class="dashboard-clear"></div>

            <div class="dashboard-col-3">
              <div class="info-card">
                <img src="../image/booking.png" id="third" class="info-card-image">
                <span class="info-card-icon info-bg-success"><i class="fas fa-book-open"></i></span>
                <div class="info-card-content">
                  <span class="info-card-label">Total Transaction
              </span>
              <?php
                                $sqlget = "SELECT * FROM payment";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');
                                $count = 0;
                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                  $count = $count + 1; 
                                }
                                echo "<span class='info-card-number'>$count</span>";
                            ?>
                </div>
              </div>
            </div>

            <div class="dashboard-col-3">
              <div class="info-card">
                <img src="../image/booking.png" id="fourth" class="info-card-image">
                <span class="info-card-icon info-bg-warning"><i class="fas fa-question"></i></span>
                <div class="info-card-content">
                  <span class="info-card-label">Total User</span>
                  <?php
                                $sqlget = "SELECT * FROM users";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');
                                $count = 0;
                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                  $count = $count + 1; 
                                }
                                echo "<span class='info-card-number'>$count</span>";
                            ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.dashboard-content -->

  <?php include('footer.php') ?>
</body>
</html>
