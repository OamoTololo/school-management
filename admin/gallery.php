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
$headerLabel = "View Gallery Images";

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
                    <div align="right">
                        <a href="add-gallery.php" class="btn btn-outline-info">Add Image</a>
                    </div>
                    <table class="table table-bordered mt-3" id="tableToExcel">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Image Id</th>
                                <th>Image Title</th>
                                <th>Image</th>
                                <th>
                                    <i class="fa fa-pencil-square"></i>
                                </th>
                                <th>
                                    <i class="fa fa-trash"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $gallery = "SELECT * FROM gallery ORDER BY gallery_id ASC";
                            $runGallery = mysqli_query($connection, $gallery);
                            $i = 0;

                            while ($rowGalley = mysqli_fetch_array($runGallery)) {
                                $galleryId = $rowGalley['gallery_id'];
                                $galleryTitle = $rowGalley['gallery_title'];
                                $galleryImage = $rowGalley['gallery_image'];

                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo ucfirst($galleryTitle);?></td>
                            <td>
                                <img class="img-fluid rounded" src="../images/gallery/<?php echo $galleryImage; ?>"
                                     width="100px;">
                            </td>
                            <td>
                                <a class="btn btn-info" href="edit-gallery.php?id=<?php echo $galleryId;?>">
                                    <i class="fa fa-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="gallery.php?del=<?php echo $galleryId;?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

</body>

</html>

<script>
    $(document).ready(function (){
        $('#tableToExcel').dataTable();
    });
</script>