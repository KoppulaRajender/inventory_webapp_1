<?php
$flag=0;
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Dashboard - Secured Page</title>
  <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript">
        //taking numeric values
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        //xmlhttp request
        function UpdateDb()
        {
        if (window.XMLHttpRequest)
          {
          xmlhttp=new XMLHttpRequest();
          }

        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
          }
        xmlhttp.open("GET","admin_stats.php",true);
        xmlhttp.send();
        }
        </script>
</head>
<body>
      <?php
      $end = date('Y-m-d', strtotime('-1 Day'));
      $file ='daily_update.log';
      if (file_exists($file)) {
        $current = file_get_contents($file);
        if($current <= $end or filesize($file) == 0){
            file_put_contents($file,date("Y-m-d"));
            $flag = 1;
        }
      }
      ?>
<div class="form">
<center><u><h1>Dashboard</h1></u>
<p>This is admin secured dashboard page.</p>
<p><a class="w3-button w3-teal w3-padding-large" href="index.php">Home</a>
<a class="w3-button w3-teal w3-padding-large" href="logout.php">Logout</a></p>
<br />
<h1>welcome Admin</h1>
<?php

  if($flag==1)
  {
    ?>
<form name="admin_dashboard" action="" method="post">
<br />
      Total Full cans:<input type="text" name="gfull" size=20 maxlength=12 onkeypress='return isNumberKey(event)'><br />
      Total Empty cans:<input type="text" name="gempty" size=20 maxlength=12 onkeypress='return isNumberKey(event)'>
      <input type="submit" name="submit"  value="Submit">
  </form>

 <?php } ?>
 </center>
</div>

<div class='form'>
<h2 style='color:#f39c12;'>Total Cans Statistics</h2>
<button onclick='UpdateDb()' class="w3-button w3-red">Load</button>
<p> <span id="result"></span></p>
</div>





</body>
</html>

<?php
require('db.php');
if (isset($_POST['submit'])){
$gfull = $_POST['gfull']; // removes backslashes
$gempty = $_POST['gempty'];
$date = date("Y-m-d");
    $query = "INSERT into `data` (date, gfull, gempty) VALUES ('$date', '$gfull', '$gempty')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<div class='form'><h3>Details have been update</h3><br/></div>";
    }
  }
?>
