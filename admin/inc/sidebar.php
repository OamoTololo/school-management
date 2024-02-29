<?php
ob_start();
session_start();
require_once('inc/db.php');

$gallery = "SELECT * FROM gallery";
$runGallery = mysqli_query($connection, $gallery);
$galleryRow = mysqli_num_rows($runGallery);

$student = "SELECT * FROM student";
$runStudent = mysqli_query($connection, $student);
$studentRow = mysqli_num_rows($runStudent);

$review = "SELECT * FROM review";
$runReview = mysqli_query($connection, $review);
$reviewRow = mysqli_num_rows($runReview);

$course = "SELECT * FROM course";
$runCourse = mysqli_query($connection, $course);
$courseRow = mysqli_num_rows($runCourse);

$register = "SELECT * FROM register";
$runRegister = mysqli_query($connection, $register);
$registerRow = mysqli_num_rows($runRegister);

$fee = "SELECT * FROM fee";
$runFee = mysqli_query($connection, $fee);
$feeRow = mysqli_num_rows($runFee);

// ==========

$category = "SELECT * FROM category";
$runCategory = mysqli_query($connection, $category);
$categoryRow = mysqli_num_rows($runCategory);

$expense = "SELECT * FROM expense";
$runExpense = mysqli_query($connection, $expense);
$expenseRow = mysqli_num_rows($runExpense);

$exam = "SELECT * FROM exam";
$runExam = mysqli_query($connection, $exam);
$examRow = mysqli_num_rows($runExam);

$message = "SELECT * FROM message";
$runMessage = mysqli_query($connection, $message);
$messageRow = mysqli_num_rows($runMessage);

$messageToClasses = "SELECT * FROM messageToClasses";
$runMessageToClasses = mysqli_query($connection, $messageToClasses);
$messageToClassesRow = mysqli_num_rows($runMessageToClasses);

$fee = "SELECT * FROM fee";
$runFee = mysqli_query($connection, $fee);
$feeRow = mysqli_num_rows($runFee);

?>

<div class="list-group bg-dark">
    <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white">
        <i class="fa fa-tachometer"></i> Dashboard
    </a>
    <a href="../admin/gallery.php" class="list-group-item list-group-item-action">
        <i class="fa fa-camera"></i> Gallery
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $galleryRow;?></span>
        </button>
    </a>
    <a href="../admin/student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i> Students
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $studentRow;?></span>
        </button>
    </a>
    <a href="../admin/review.php" class="list-group-item list-group-item-action">
        <i class="fa fa-star"></i> Reviews
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $reviewRow;?></span>
        </button>
    </a>
    <a href="../admin/course.php" class="list-group-item list-group-item-action">
        <i class="fa fa-life-ring"></i> Batches
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $courseRow;?></span>
        </button>
    </a>
    <a href="../admin/register.php" class="list-group-item list-group-item-action">
        <i class="fa fa-lightbulb"></i> Registrations
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $registerRow;?></span>
        </button>
    </a>

    <a href="../admin/fees.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money-bill"></i> Fees
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $feeRow;?></span>
        </button>
    </a>

    <a href="../admin/category.php" class="list-group-item list-group-item-action">
        <i class="fa fa-sort"></i> Category
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $categoryRow;?></span>
        </button>
    </a>

    <a href="../admin/expense.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money-bill"></i> Expenses
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $expenseRow;?></span>
        </button>
    </a>

    <a href="../admin/exam.php" class="list-group-item list-group-item-action">
        <i class="fa fa-question"></i> Exam
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $examRow;?></span>
        </button>
    </a>

    <a href="../admin/message.php" class="list-group-item list-group-item-action">
        <i class="fa fa-envelope"></i> Message(s)
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $messageRow;?></span>
        </button>
    </a>

    <a href="../admin/complaint.php" class="list-group-item list-group-item-action">
        <i class="fa fa-window-close"></i> Complaints
        <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $messageToClassesRow;?></span>
        </button>
    </a>

</div>