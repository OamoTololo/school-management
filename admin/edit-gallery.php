<?php
ob_start();
session_start();

//If session is not found
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

require_once('inc/top.php');
require_once('inc/db.php');

//variables
$headerLabel = "Update Image";

if ($_GET['id']) {
    $editId = $_GET['id'];
    $gallery = "SELECT * FROM gallery WHERE gallery_id = '$editId'";
    $runGallery = mysqli_query($connection, $gallery);
    $rowGallery = mysqli_fetch_array($runGallery);

    $galleryId = $rowGallery['gallery_id'];
    $galleryTitle = $rowGallery['gallery_title'];
    $galleryImageA = $rowGallery['gallery_image'];
}
?>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <?php include('inc/navbar.php');?>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-3">
            <?php include('inc/sidebar.php');?>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-dark"><?php echo $headerLabel;?></h2>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-danger" for="imageTitle">Image Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-file" name="imageTitle" value="<?php echo $galleryTitle?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-danger" for="imageTitle">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="uploadImage" value="<?php echo $galleryImage?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-dark text-white btn-dark" name="update" type="submit">Update Image</button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php
if (isset($_POST['update']) && isset($_FILES['uploadImage'])) {
    $imageTitle =$_POST['imageTitle'];
    $imageName = $_FILES['uploadImage']['name'];
    $tempName = $_FILES['uploadImage']['tmp_name'];


    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
    $imageExtensionLowerCase = strtolower($imageExtension);
    $allowedExtensions = array("jpg", "jpeg", "png");

    if(empty($imageName)) {
        $imageName = $galleryImageA;
    } else {
        if (in_array($imageExtensionLowerCase, $allowedExtensions))
            $imageName = uniqid('IMG-', true) . $imageExtensionLowerCase;
    }

    $imageUploadPath = "../images/gallery/" . $imageName;
    move_uploaded_file($tempName, $imageUploadPath);

    $uploadImage = "UPDATE gallery SET gallery_title ='$imageTitle',  gallery_image = '$imageName' WHERE gallery_id = '$editId'";
    $uploadQuery = mysqli_query($connection, $uploadImage);

        if ($uploadQuery) {
            echo "<script>alert('Image updated to gallery.')</script>";
            echo "<script>window.open('gallery.php', '_self')</script>";
        } else {
            echo "<script>alert('Image could not be updated to gallery.')</script>";
            echo "<script>window.open('gallery.php', '_self')</script>";
        }
}
?>