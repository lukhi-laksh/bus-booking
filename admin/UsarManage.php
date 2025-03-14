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
                <h1 class="m-0 text-dark">Manage Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Display Users -->
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Manage Users
                </h3>
                <!-- Search bar -->
                <div class="card-tools">
                    <div class="input-group" style="width: 252px;">
                        <input type="text" class="form-control form-control-sm" id="searchInput" onkeyup="filterUsers()" placeholder="Search User" aria-label="Search">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sqlget = "SELECT * FROM users";
                                $sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');

                                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>{$row['user_id']}</td>";
                                    echo "<td>{$row['First_Name']}</td>";
                                    echo "<td>{$row['Last_Name']}</td>";
                                    echo "<td>{$row['username']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>
                                        <form action='delete_user.php' method='POST' style='display:inline;'>
                                            <input type='hidden' name='user_id' value='{$row['user_id']}'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                        </form>
                                    </td>";
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
function filterUsers() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table tbody");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if (td) {
            var match = false;
            for (var j = 0; j < td.length - 2; j++) { // Skip the last two columns (Update and Delete)
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
