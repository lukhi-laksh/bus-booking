<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="cssfile/nav.css">
</head>
<body>
  
  <nav>
    <ul>
      <li class="logo"><h4>SARTHI</h4></li>
      <li class="btn"><span class="fas fa-bars"></span></li>
      <div class="items">
        <li><a href="home.php">Home</a></li>
        <li><a href="viewBus.php">Routes</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="login.php">SignUp / Login</a></li>
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
    $('nav ul li.btn span').click(function(){
      $('nav ul div.items').toggleClass("show");
      $('nav ul li.btn span').toggleClass("show");
    });
  </script>
</body>
</html>
