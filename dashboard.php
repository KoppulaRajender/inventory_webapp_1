<?php
require('db.php');
include("auth.php");
$uname = $_SESSION['username'];
$i=0;

//include auth.php file on all secure pages ?>
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
    </script>
</head>
<body>
<div class="form">
  <center><u><h1>Dashboard</h1></u>
<p>This is another secured page.</p>
<p><a class="w3-button w3-teal w3-padding-large" href="index.php">Home</a>
<a class="w3-button w3-teal w3-padding-large" href="logout.php">Logout</a></p>
<br />
<h1>welcome <?php echo " $uname";?></h1>
</div>
<div class="form">

  <form name="admin_dashboard" action="" method="post">
    <?php if($i==0){
      echo "
        <h5>Request cans:<input type='text' name='ufull' size=20 maxlength=12 onkeypress='return isNumberKey(event)'><br /></h5>
        <input type='submit' name='submit'  value='Submit'>";
     } ?>


    </form>
  </center>

</div>
</body>
</html>

<?php
$i=1;
echo "$i";
require('db.php');
if (isset($_POST['submit'])){
  $uname = $_SESSION['username'];
$ufull = $_POST['ufull']; // removes backslashes
$str = date("Y-m-d");
$time = strtotime($str);
$d = date('Y-m-d',$time);

    //$query = "INSERT into `data` ( $uname ) VALUES ( '$ufull' )  WHERE strcmp(DATE_FORMAT(date,'%Y-%m-%d'),$d)=0 ";
    $query = "UPDATE `data` SET $uname = $ufull WHERE  date='$d' ";

    $result = mysqli_query($con,$query);
    if($result){
        echo "<div class='form'><h4>Request has been sent</h4><br/></div>";
    }
    //if (!$result) {
    //echo"Invalid query:.mysqli_error($con) ";
    //}
}
    echo "<br />";

//echo "<h2 class='form'> $uname Requests</h2>";
?>
