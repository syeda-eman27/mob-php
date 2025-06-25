<?php include 'dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Mobiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">All Mobile Phones</h2>
    <div class="row">

<?php
$sql = "SELECT * FROM mobiles";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="' . $row['MobileImgPath'] . '" class="card-img-top" alt="Product Image" style="height: 300px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title">' . $row['MobileName'] . '</h5>
                    <p class="card-text">' . $row['MobileDesc'] . '</p>
                    <p class="card-text"><strong>Category:</strong> ' . $row['MobileCatag'] . '</p>
                    <p class="card-text"><strong>Price:</strong> ' . $row['MobliePrice'] . ' PKR</p>
                    <p class="card-text"><strong>Quantity:</strong> ' . $row['MobileQuantity'] . '</p>
                    <a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</a>
                </div>
            </div>
        </div>';
    }
} else {
    echo "<p>No Mobiles found.</p>";
}
?>
    </div>
    <a href="iphone.php" class="btn btn-secondary mt-4">Show Only iPhones</a>
    <a href="samsung.php" class="btn btn-secondary mt-4">Show Only Samsung</a>
    <a href="realMei.php" class="btn btn-secondary mt-4">Show Only Real-Mei</a>


</div>
</body>
</html>
