<?php
include("auth.php"); //include auth.php file on all secure pages ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><title>admin index</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
<h3>This is admin secure area</h3>
<p><a class="w3-button w3-teal w3-padding-large" href="admin_dashboard.php">Dashboard</a>
<a class="w3-button w3-teal w3-padding-large" href="logout.php">Logout</a></p>


<br /><br /><br /><br />
</div>
</body>
</html>
