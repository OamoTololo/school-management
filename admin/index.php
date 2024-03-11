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
$websiteLogo = "Sosha IT Academy";
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
                    <h2 class="text-center text-white bg-dark">Stats Overview of <?php echo $websiteLogo;?></h2>
                </div>

                <div class="col-md-3">
                    <div class="card text-primary border-info">
                        <div class="card-header bg-info  text-white">Students</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                <?php
                                    for($i = 0; $i <= 10; $i++) {
                                        $student = "SELECT * FROM student WHERE student_class = '$i'";
                                        $runStudent = mysqli_query($connection, $student);
                                        $studentRow = mysqli_num_rows($runStudent);
                                ?>
                                    <tr>
                                        <th class="bg-light text-dark">Class <?php echo $i ;?></th>
                                        <th class="text-danger"><?php echo  $studentRow; ?></th>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-primary border-info">
                        <div class="card-header bg-info  text-white">Total Fee Collected</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                <?php
                                    $studentTotalFee = "SELECT * FROM student";
                                    $runStudentTotalFee = mysqli_query($connection, $studentTotalFee);
                                    $studentTotalFee = 0;
                                    $totalFeesAmount = 0;

                                    while ($studentTotalFeeRow = mysqli_fetch_array($runStudentTotalFee)) {
                                        $studentTotalFee = $studentTotalFeeRow['student_fee'];
                                        $totalFeesAmount += $studentTotalFee;
                                    }

                                    $feeAmount = "SELECT * FROM fee";
                                    $runFee = mysqli_query($connection, $feeAmount);
                                    $fees = 0;
                                    $feeAmount = 0;

                                    while ($feeAmountRow = mysqli_fetch_array($runFee)) {
                                        $fees = $feeAmountRow['fees'];
                                        $feeAmount += $fees;
                                    }
                                ?>
                                <tr>
                                    <th class="bg-light text-dark">Total Fees</th>
                                    <th>R <?php echo $totalFeesAmount;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-dark">Collected Fees</th>
                                    <th>R <?php echo $feeAmount;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-danger">Remaining Fees</th>
                                    <th class="text-danger">R <?php echo $totalFeesAmount - $feeAmount;?></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="card text-primary border-info">
                        <div class="card-header bg-info  text-white">Balance Cash</div>
                        <div class="card-body">
                            <table class="table table-bordered table-co">
                                <tbody>
                                <?php
                                    $expense = "SELECT * FROM expense";
                                    $runExpense = mysqli_query($connection, $expense);
                                    $expenseAmount = 0;
                                    $totalExpense = 0;

                                    while ($rowExpense = mysqli_fetch_array($runExpense)) {
                                        $expenseAmount = $rowExpense['expense_amount'];
                                        $totalExpense += $expenseAmount;
                                    }
                                ?>
                                <tr>
                                    <th class="bg-light text-dark">Collected Fees</th>
                                    <th>R <?php echo $feeAmount;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-dark">Spent Fees</th>
                                    <th>R <?php echo $totalExpense;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-danger">Remaining Balance</th>
                                    <th class="text-danger">R <?php echo $feeAmount - $totalExpense;?></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>


                </div>
                <div class="col-md-5">
                    <div class="card text-primary border-info">
                        <div class="card-header bg-info text-white">Expenses <small>( Last 10 expenses )</small></div>
                        <div class="card-body">
                            <table class="table table-bordered table-co">
                                <thead class="">
                                    <tr>
                                        <th class="text-dark">Sr No</th>
                                        <th class="text-dark">Date</th>
                                        <th class="text-dark">Amount</th>
                                        <th class="text-dark">Particular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $expenses = "SELECT * FROM expense ORDER BY  expense_id ASC LIMIT 10";
                                    $runExpenses = mysqli_query($connection, $expenses);
                                    $expenseId = 0;

                                    while ($rowExpenses = mysqli_fetch_array($runExpenses)) {
                                        $expenseAmount = $rowExpenses['expense_amount'];
                                        $expenseDescription = $rowExpenses['expense_particular'];
                                        $expenseDate = $rowExpenses['expense_date'];

                                        $expenseId = $expenseId + 1;

                                ?>
                                <tr>
                                    <td class="bg-light text-danger"><?php echo $expenseId; ?></td>
                                    <td class="bg-light text-danger"><?php echo  $expenseDate; ?></td>
                                    <td class="bg-light text-danger">R <?php echo $expenseAmount?></td>
                                    <td class="bg-light text-danger"><?php echo $expenseDescription;?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
