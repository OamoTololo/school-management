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
$headerLabel = "Add Student";

if (isset($_GET['del'])) {
    $deleteId = $_GET['del'];

    $deleteQuery = "DELETE FROM students WHERE gallery_id = '$deleteId'";
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
                                <label class="col-sm-2 col-form-label text-danger" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name" required id="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="surname">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Surname" name="surname" required id="surname" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="address">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required id="address" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="class">Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" id="class">
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                        <option value="4">Class 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="batch">Batch</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="batch" id="batch">
                                        <?php
                                            $getBatch = "SELECT * FROM course";
                                            $runBatch = mysqli_query($connection, $getBatch);

                                            while ($rowBatch = mysqli_fetch_array($runBatch)) {
                                                $courseId = $rowBatch['course_id'];
                                                $courseName = $rowBatch['course_name'];

                                        ?>
                                        <option value="<?php echo  $courseId; ?>"><?php echo $courseName; ?></option>
                                                <?php
                                            }
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="medium">Medium</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="medium" id="medium">
                                        <option value="freshman">Freshman</option>
                                        <option value="junior">Junior</option>
                                        <option value="sophomore">Sophomore</option>
                                        <option value="senior">Senior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="gender">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="phoneNo">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Phone No" name="phoneNo" required id="phoneNo" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" required id="email" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="school">School</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter School" name="school" required id="school" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="fee">Fee</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Fee" name="fee" required id="fee" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required id="password" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="dob">DOB</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob"
                                           required id="dob" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="date">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Date" name="date" required id="date" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="image">Student Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file btn btn-info" placeholder="Enter Image Name" name="uploadImage" required id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-outline-dark btn-block" name="submit">Add Student</button>
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
    $studentName = $_POST['name'];
    $studentSurname = $_POST['surname'];
    $studentAddress = $_POST['address'];
    $studentClass = $_POST['class'];
    $studentBatch = $_POST['batch'];
    $studentMedium = $_POST['medium'];
    $studentGender = $_POST['gender'];
    $studentPhoneNo = $_POST['phoneNo'];
    $studentEmail = $_POST['email'];
    $studentSchool = $_POST['school'];
    $studentFee = $_POST['fee'];
    $studentPassword = $_POST['password'];
    $studentDOB = $_POST['dob'];
    $studentDate = $_POST['date'];

    $imageTitle = $_POST['imageTitle'];
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
                $imageName = uniqid('IMG-', true) . "." . $imageExtensionLowerCase;
                $imageUploadPath = "../images/student/" . $imageName;
                move_uploaded_file($tempName, $imageUploadPath);
            } else {
                echo "<script> alert('Unrecognized extension!')</script>";
                echo "<script> window.open('gallery.php', '_self')</script>";
            }
        }
    } else {
        echo "<script> alert('Image is unable to be loaded.')</script>";
        echo "<script> window.open('gallery.php', '_self')</script>";
    }

    $addStudent = "INSERT INTO student (
                     student_name, 
                     student_surname, 
                     student_address, 
                     student_class, 
                     student_batch, 
                     student_medium,
                     student_gender,
                     student_phone_no,
                     student_email,
                     student_school,
                     student_fee,
                     student_password,
                     student_dob,
                     student_image,
                     student_date
                     ) VALUES ('$studentName', '$studentSurname', '$studentAddress', '$studentClass', '$studentBatch', '$studentMedium', '$studentGender',
                               '$studentPhoneNo', '$studentEmail', '$studentSchool', '$studentFee', '$studentPassword','$studentDOB', '$imageUploadPath' '$studentDate')";
    $addQuery = mysqli_query($connection, $addStudent);

    if ($addQuery) {
        echo "<script>alert('Image added to gallery.')</script>";
        echo "<script>window.open('gallery.php', '_self')</script>";
    } else {
        echo "<script> alert('Image not added to gallery! Contact Admin.', '_self')</script>";
    }
}
?>