<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="cssfile/nav1.css"> 
</head>
<body>
  
  <nav>
    <ul>
      <li class="logo"><h4>SARTHI</h4></li>
      <li class="btn"><span class="fas fa-bars"></span></li>
      <div class="items">
        <li><a href="home1.php">Home</a></li>
        <li><a href="viewBus1.php">Routes</a></li>
        <li><a href="help1.php">Help</a></li>
        <li><a href="AboutUs1.php">About Us</a></li>
        <li><a href="contact_us1.php">Contact Us</a></li>
        <li class="profile-img">
          <a href="profile.php">
            <img src="image/profile.png">
          </a>
        </li>
      </div>
      <li class="search-icon">
        <input type="search" placeholder="Search">
        <label class="icon">
          <span class="fas fa-search"></span>
        </label>
      </li>
    </ul>
  </nav>
  
  <script>
    document.querySelector('nav ul li.btn span').addEventListener('click', function(){
      document.querySelector('nav ul div.items').classList.toggle("show");
      document.querySelector('nav ul li.btn span').classList.toggle("show");
    });
  </script>
</body>
</html>
