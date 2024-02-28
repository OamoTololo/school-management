<?php
ob_start();
session_start();

//If session is not found
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

require_once('inc/top.php');

//variables
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
                    <h2 class="text-center text-white bg-dark">Stats Overview of Sosha IT Academy</h2>
                </div>

                <div class="col-md-3">
                    <div class="card text-primary border-dark">
                        <div class="card-header bg-dark  text-white">Students</div>
                        <div class="card-body">
                            <table class="table table-bordered table-co">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white">Class 1</th>
                                        <th>0</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 2</th>
                                        <th>0</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 3</th>
                                        <th>0</th>
                                    </tr>
                                </tbody>
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
                                <tr>
                                    <th class="bg-light text-dark">Total Fees</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-dark">Collected Fees</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white">Remaining Fees</th>
                                    <th>0</th>
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
                                <tr>
                                    <th class="bg-light text-dark">Collected Fees</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th class="bg-light text-dark">Spent Fees</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white">Remaining Balance</th>
                                    <th>0</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>


                </div>
                <div class="col-md-5">
                    <div class="card text-primary border-dark">
                        <div class="card-header bg-dark  text-white">Expenses <small>( Last 10 expenses )</small></div>
                        <div class="card-body">
                            <table class="table table-bordered table-co">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-light">Sr No</th>
                                        <th class="text-light">Date</th>
                                        <th class="text-light">Amount</th>
                                        <th class="text-light">Particular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="bg-light text-dark">1</td>
                                    <td class="bg-light text-dark">dd/mm/yyyy</td>
                                    <td class="bg-light text-dark">R0</td>
                                    <td class="bg-light text-dark">Mobile bill</td>
                                </tr>
                                <tr>
                                    <td class="bg-light text-dark">2</td>
                                    <td class="bg-light text-dark">dd/mm/yyyy</td>
                                    <td class="bg-light text-dark">R0</td>
                                    <td class="bg-light text-dark">Light bill</td>
                                </tr>
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
