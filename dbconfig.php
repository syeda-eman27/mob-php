<!-- dbconfig.php -->
<?php
$conn = mysqli_connect("localhost", "root", "", "mobile_shop");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
