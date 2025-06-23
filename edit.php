<?php

include 'dbconfig.php';
echo "<h1>". $_GET['id']."</h1>";
$id = $_GET['id'];
// Create connection
$result = mysqli_query($conn,"SELECT * FROM mobiles WHERE id = $id");
$row = mysqli_fetch_assoc($result);
echo"<table border='1'>";
echo "<tr>"; 
echo "<td>".$row['id'] ."</td>"; 
echo "<td>".$row['MobileName'] ."</td>";
echo "<td>".$row['MobilePrice'] ."</td>";
echo "<td>".$row['MobileQuantity'] ."</td>";
echo "<td>".$row['MobileDesc'] ."</td>";
echo "<td>".$row['MobileImgPath'] ."</td>";

"</tr>";

echo $row['MobileName'];
echo "</table>";