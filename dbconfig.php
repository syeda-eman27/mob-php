<!-- dbconfig.php -->
<?php
// $conn = mysqli_connect("localhost", "root", "", "mobile_shop");
$conn = mysqli_connect("localhost", "root", "", "mobdbcollection");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
