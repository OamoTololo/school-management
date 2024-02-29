<?php
ob_start();
session_start();

//If session is not found
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

require_once('inc/top.php');
require_once ('inc/db.php');

//variables
$headerLabel = "Add Image to Gallery";

if (isset($_GET['del'])) {
    $deleteId = $_GET['del'];

    $deleteQuery = "DELETE FROM gallery WHERE gallery_id = '$deleteId'";
    $runDelete = mysqli_query($connection, $deleteQuery);

    if ($runDelete) {
        echo "<script>alert('Image deleted successfully')</script>";
        echo "<script>window.open('gallery.php', '_self')</script>";
    }
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

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-danger" for="imageTitle">Image Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Enter Image Title" name="imageTitle" required id="imageTitle" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-danger" for="image">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file btn btn-info" placeholder="Enter Image Name" name="uploadImage" required id="image">
                        </div>
                    </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-outline-success btn-block" name="submit">Add</button>
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
    if (isset($_POST['submit']) && isset($_FILES['uploadImage'])) {
        $imageTitle =$_POST['imageTitle'];
        $imageName = $_FILES['uploadImage']['name'];
        $imageSize = $_FILES['uploadImage']['size'];
        $tempName = $_FILES['uploadImage']['tmp_name'];
        $error = $_FILES['uploadImage']['error'];

        if ($error === 0) {

            if ($imageSize > 12500000) {
                echo "<script>alert('Image is too large to be added.')</script>";
                echo "<script>window.open('gallery.php', '_self')</script>";
            } else {
                $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                $imageExtensionLowerCase = strtolower($imageExtension);
                $allowedExtensions = array("jpg", "jpeg", "png");

                if (in_array($imageExtensionLowerCase, $allowedExtensions)) {
                    $newImageName = uniqid('IMG-', true) .$imageExtensionLowerCase;
                    $imageUploadPath = "../images/gallery/" . $newImageName;
                    move_uploaded_file($tempName, $imageUploadPath);


                    $uploadImage = "INSERT INTO gallery (gallery_title, gallery_image) VALUES ('$imageTitle', '$newImageName')";
                    $uploadQuery = mysqli_query($connection, $uploadImage);

                    if ($uploadQuery) {
                        echo "<script>alert('Image added to gallery.')</script>";
                        echo "<script>window.open('gallery.php', '_self')</script>";
                    } else {
                        echo "<script> alert('Image not added to gallery! Contact Admin.', '_self')</script>";
                    }
                } else {
                    echo "<script> alert('Unrecognized extension!')</script>";
                    echo "<script> window.open('gallery.php', '_self')</script>";
                }
            }
        } else {
            echo "<script> alert('Image is unable to be loaded.')</script>";
            echo "<script> window.open('gallery.php', '_self')</script>";
        }
    }
    ?>