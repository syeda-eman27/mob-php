<?php
include 'dbconfig.php';
// include 'navbar.php';
// Query to get iPhones from 'mobiles' table
// $sql = "SELECT * FROM mobiles WHERE MobileCat = 'iphone'";

$sql = "SELECT * FROM mobiles WHERE MobileCatag = 'iphone'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

// $sql = "SELECT * FROM mobiles WHERE MobileCatag = 'iphone'";
// $result = mysqli_query($conn, $sql);

// if (!$result) {
//     die("Query Failed: " . mysqli_error($conn));
// }

// while ($row = mysqli_fetch_assoc($result)) {
//     echo "<h3>" . $row['MobileName'] . "</h3>";
//     echo "<p>Price: " . $row['MobilePrice'] . "</p>";
//     echo "<img src='" . $row['MobileImgPath'] . "' width='100'><hr>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iPhones</title> 
  <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

<div class="container my-4">
  <h2 class="mb-4">Available iPhones</h2>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow">
        <img src="<?php echo $row['MobileImgPath']; ?>" class="card-img-top" alt="Product Image" style="height: 300px; object-fit: contain;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['MobileName']; ?></h5>
            <p class="card-text">Rs. <?php echo number_format($row['MobliePrice']); ?></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary w-100">Add to Cart</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
