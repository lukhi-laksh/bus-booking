<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>About NAPSHILA</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="cssfile/login.css">
    <link rel="stylesheet" href="cssfile/about_us.css">
    <style>
        /* Additional styles if needed */
    </style>
</head>
<body>

    <?php include("nav1.php"); ?>

    <div class="about-sec">
        <div class="about-img">
            <img src="image/bus2.jpg" alt="Bus Image">
        </div>
        <div class="about-intro">
            <h3>About Us<span style="color: #00b894;">!</span></h3>
            <p>We, eToursLanka (Pvt) Ltd., are pioneers in Online Bus Ticket Booking Service in Sri Lanka since 2010. Our website, www.NZfare.LK, is launched in collaboration with NTC/CTB registered buses in Sri Lanka.</p>
        </div>
    </div>

    <?php include("connection.php"); ?>

    <h1 class="topic_bus">...Our Buses...</h1>

    <?php
    // Fetch data from the 'bus' table
    $sqlget = "SELECT * FROM bus";
    $sqldata = mysqli_query($conn, $sqlget) or die('Error getting data');

    echo "<table>";
    echo "<tr>
        <th>ID</th>
        <th>Bus Name</th>
        <th>Bus Number Plate</th>
    </tr>";

    // Display fetched data
    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['Bus_Name']}</td>
            <td>{$row['Bus_NumberPlate']}</td>
        </tr>";
    }

    echo "</table>";
    ?>

    <div class="about-sec">
        <div class="about-img">
            <img src="image/bus3.jpg" alt="Bus Image">
        </div>
        <div class="about-intro">
            <p>Plan your trip, reserve bus tickets, and arrive at your destination.</p>
            <p>We offer a complete online bus booking platform where you can buy and sell bus seats. Travelers can purchase bus tickets online, and a text message with travel details will be delivered to confirm the seat reservation.</p>
            <p>Plan your journey ahead of time, save time buying bus tickets, avoid lengthy lines, discover your boarding location quickly, and enjoy your journey in comfort using our efficient bus reservation system.</p>
        </div>
    </div>

</body>
</html>
