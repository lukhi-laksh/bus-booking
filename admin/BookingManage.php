<?php 
session_start();
include("../connection.php");
include('header.php'); 
include('sidebar.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Bookings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Display Bookings -->
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Manage Bookings
                </h3>
                <!-- Search bar -->
                <div class="card-tools">
                    <div class="input-group" style="width: 252px;">
                        <input type="text" class="form-control form-control-sm" id="searchInput" onkeyup="filterBookings()" placeholder="Search Booking" aria-label="Search">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Passenger Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Alternate Telephone</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sqlget = "SELECT * FROM booking";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');

                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['passenger_name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['telephone']}</td>";
                                    echo "<td>{$row['alternate_telephone']}</td>";
                                    echo "<td><button class='btn-action'><a href='deleteBooking.php?id={$row['id']}'>Delete</a></button></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Search functionality -->
<script>
function filterBookings() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table tbody");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if (td) {
            var match = false;
            for (var j = 1; j < td.length - 1; j++) { // Skip the ID column and last column (Delete)
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
            tr[i].style.display = match ? "" : "none";
        }
    }
}
</script>

<?php include('footer.php'); ?>
