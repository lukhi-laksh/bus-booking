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
                <h1 class="m-0 text-dark">Manage Bus Routes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Routes</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Display Routes -->
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Manage Bus Routes
                </h3>
                <!-- Button and search bar style -->
                <style>
                    .margin {
                        margin: 5px; /* All sides 5px space */
                    }
                    .custom-margin {
                        margin: 2px; /* All sides 2px space */
                    }
                </style>
                <div class="card-tools margin">
                    <div class="input-group" style="width: 252px;">
                        <input type="text" class="form-control form-control-sm custom-margin" id="searchInput" onkeyup="filterRoutes()" placeholder="Search Route" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Via City</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Bus Number</th>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Departure Time</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sqlget = "SELECT * FROM route";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching routes');

                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['via_city']}</td>";
                                    echo "<td>{$row['destination']}</td>";
                                    echo "<td>{$row['bus_name']}</td>";
                                    echo "<td>{$row['departure_date']}</td>";
                                    echo "<td>{$row['departure_time']}</td>";
                                    echo "<td>{$row['cost']}</td>";
                                    echo "<td><button class='btn-action'><a href='updateRoute.php?id={$row['id']}'>Update</a></button></td>";
                                    echo "<td><button class='btn-action'><a href='deleteRoute.php?id={$row['id']}'>Delete</a></button></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="Addroute.php">
                    <button class="btnPolicy">Add New Route</button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Search functionality -->
<script>
function filterRoutes() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table tbody");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if (td) {
            var match = false;
            for (var j = 1; j < td.length; j++) { // Start from 1 to skip ID column
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
