<?php include 'dbconfig.php';

$id = $_GET['id'];
$query = "SELECT * FROM mobiles WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mobile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Edit Mobile</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">

        <div class="mb-3">
            <label class="form-label">Mobile Name</label>
            <input type="text" name="MobileName" value="<?= $row['MobileName'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="MobliePrice" value="<?= $row['MobliePrice'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="MobileQuantity" value="<?= $row['MobileQuantity'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="MobileDesc" class="form-control" required><?= $row['MobileDesc'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="MobileCatag" class="form-control">
                <option <?= $row['MobileCatag'] == 'iphone' ? 'selected' : '' ?>>iphone</option>
                <option <?= $row['MobileCatag'] == 'samsung' ? 'selected' : '' ?>>samsung</option>
                <option <?= $row['MobileCatag'] == 'oppo' ? 'selected' : '' ?>>oppo</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Change Image (optional)</label>
            <input type="file" name="MobileImgPath" class="form-control">
            <input type="hidden" name="oldImg" value="<?= $row['MobileImgPath'] ?>">
        </div>

        <button type="submit" name="btnUpdate" class="btn btn-primary w-100">Update Mobile</button>
        <a href="Showall.php" class="btn btn-secondary w-100 mt-2">Back</a>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['MobileName'];
    $price = $_POST['MobliePrice'];
    $qty = $_POST['MobileQuantity'];
    $desc = $_POST['MobileDesc'];
    $cat = $_POST['MobileCatag'];
    
    if ($_FILES['MobileImgPath']['name'] != "") {
        $img = $_FILES['MobileImgPath']['name'];
        $tmp = $_FILES['MobileImgPath']['tmp_name'];
        $imgPath = "img/" . $img;
        move_uploaded_file($tmp, $imgPath);
    } else {
        $imgPath = $_POST['oldImg'];
    }

    $update = "UPDATE mobiles SET 
        MobileName='$name',
        MobliePrice='$price',
        MobileQuantity='$qty',
        MobileDesc='$desc',
        MobileImgPath='$imgPath',
        MobileCatag='$cat'
        WHERE id = $id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Mobile updated!'); window.location.href='Showall.php';</script>";
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>
