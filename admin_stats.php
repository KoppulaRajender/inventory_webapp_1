<?php
require('db.php');
include("auth.php");
$query = "SELECT * FROM data"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><td>Date</td><td>Total Fcans</td><td>Total Ecans</td><td>koppula</td><td>raju</td><td>rakesh</td><td>LEFT OUT</td></tr>";

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

  $gfull = $row['gfull'];
  $gempty = $row['gempty'];
  $koppula = $row['koppula'];
  $raju = $row['raju'];
  $rakesh = $row['rakesh'];

echo "<tr><td>" . $row['date'] . "</td><td style='color:blue;'>$gfull</td><td style='color:blue;'>$gempty</td>
<td style='color:blue;'>$koppula</td><td style='color:blue;'>$raju</td style='color:blue;'><td style='color:blue;'>$rakesh</td>
<td style='color:red;' >" . ($gfull-($koppula+$raju+$rakesh)) . "</td></tr>";
}

echo "</table>";


?>
