<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<?php
include 'dbconfig.php';
if(isset($_POST['btnSave'])){
    extract($_POST);
    $fileName = $_FILES['mobimg']['name'];
    $fileTmp = $_FILES['mobimg']['tmp_name'];
    $dir = "./img/".$fileTmp;
    $fullpath = "/img/".$fileName;
    move_uploaded_file($dir,$fileName);
$sql = "INSERT INTO mobiles(id,MobileName,MobliePrice,MobileQuantity,MobileDesc,MobileImgPath,MobileCatag) VALUES (NULL,'$mobname', '$mobprice', '$mobQunat', '$mobdesc', '$fullpath','$mobCateg')";
mysqli_query($conn,$sql);

    unset($_POST['btnSave']);
}

?>

<!-- Your existing HTML form here -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Add Mobile Phone</h2>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="mobname" class="form-label">Mobile Name:</label>
                            <input type="text" class="form-control" id="mobname" name="mobname" required>
                        </div>
                        <div class="mb-3">
                     <label for="mobCateg" class="form-label">Category:</label>
                       <select class="form-select" id="mobCateg" name="mobCateg" required>
                           <option value="" selected disabled>Select Category</option>
                          <option value="Smartphone">iphone</option>
                           <option value="Feature Phone">samsung</option>
                            <option value="Gaming Phone">oppo</option>
                                <option value="Foldable">infinix</option>
                                  <option value="Budget">realmei</option>
                                    <option value="Flagship">Flagship</option>
                                  </select>
                           </div>
                        <div class="mb-3">
                            <label for="mobprice" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="mobprice" name="mobprice" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobQunat" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="mobQunat" name="mobQunat" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobdesc" class="form-label">Description:</label>
                            <textarea class="form-control" id="mobdesc" name="mobdesc" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="mobimg" class="form-label">Image:</label>
                            <input class="form-control" type="file" id="mobimg" name="mobimg" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
