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
$headerLabel = "View Students";

if (isset($_GET['del'])) {
    $deleteId = $_GET['del'];

    $deleteQuery = "DELETE FROM student WHERE student_id = '$deleteId'";
    $runDelete = mysqli_query($connection, $deleteQuery);

    if ($runDelete) {
        echo "<script>alert('Student deleted successfully')</script>";
        echo "<script>window.open('student.php', '_self')</script>";
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
                        <a href="add-student.php" class="btn btn-outline-info">Add Student</a>
                    </div>
                    <table class="table table-bordered mt-3" id="tableToExcel">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Sr No</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <th>Batch</th>
                            <th>DOB</th>
                            <th>Image</th>
                            <th>
                                <i class="fa fa-eye"></i>
                            </th>
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
                        $student = "SELECT * FROM student ORDER BY student_id ASC";
                        $runStudent = mysqli_query($connection, $student);
                        $i = 0;

                        while ($rowStudent = mysqli_fetch_array($runStudent)) {
                            $studentId  = $rowStudent['student_id'];
                            $name = $rowStudent['student_name'];
                            $surname = $rowStudent['student_surname'];
                            $fullName = $name . ' ' . $surname;
                            $gender = $rowStudent['student_gender'];
                            $batch = $rowStudent['student_batch'];
                            $dob = $rowStudent['student_dob'];
                            $image = $rowStudent['student_image'];
                            $i++;

                            $course = "SELECT * FROM course WHERE course_id = '$batch'";
                            $runCourse = mysqli_query($connection, $course);
                            $rowCourse = mysqli_fetch_array($runCourse);

                            $courseId = $rowCourse['course_id'];
                            $courseName = $rowCourse['course_name'];
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($fullName);?></td>
                                <td><?php echo ucfirst($gender);?></td>
                                <td><?php echo ucfirst($batch);?></td>
                                <td><?php echo ucfirst($dob);?></td>
                                <td>
                                    <img class="img-fluid rounded" src="../images/student/<?php echo $image; ?>"
                                         width="100px;">
                                </td>
                                <td>
                                    <a class="btn btn-info" href="student-details.php?id=<?php echo $studentId;?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="edit-student-details.php?id=<?php echo $studentId;?>">
                                        <i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="student.php?del=<?php echo $deleteId;?>">
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