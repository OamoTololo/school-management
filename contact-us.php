<?php
include 'inc/top.php';
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 mt-2">
            <?php include 'inc/navbar.php';?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <h2>Registration Here</h2>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="name">Name</label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control" placeholder="Enter your Name" style="border: 1px
                        solid black; padding-left: 5px;" id="name">
                    </div>
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="surname">Surname</label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control" placeholder="Enter your Surname" style="border: 1px
                        solid black; padding-left: 5px;" id="surname">
                    </div>
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="email">Email</label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control" placeholder="Enter your Email" style="border: 1px
                        solid black; padding-left: 5px;" id="email">
                    </div>
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="phoneNumber">Phone No</label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control" placeholder="Enter your Number" style="border: 1px
                        solid black; padding-left: 5px;" id="phoneNumber">
                    </div>
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="address">Address</label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control" placeholder="Enter your Address" style="border: 1px
                        solid black; padding-left: 5px;" id="address">
                    </div>
                    <label class="col-sm-2 mt-2 col-form-label text-dark" for="class">Class</label>
                    <div class="col-sm-10 mt-2">
                        <select class="form-control" name="qualification" id="class" style="border: 1px solid black;
                        padding-left: 5px;">
                            <option value="1">Class 1</option>
                            <option value="2">Class 2</option>
                            <option value="3">Class 3</option>
                            <option value="4">Class 4</option>
                            <option value="5">Class 5</option>
                            <option value="6">Class 6</option>
                            <option value="7">Class 7</option>
                            <option value="8">Class 8</option>
                            <option value="9">Class 9</option>
                            <option value="10">Class 10</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button class="btn btn-success" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 mt-2 table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Std No</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Course Fee</th>
                    <th>Batch Starts</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Class 1/SEMI/All</td>
                    <td>1 Yr</td>
                    <td>9999</td>
                    <td>01/04/2019</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2">
            <?php include 'inc/footer.php';?>
        </div>
    </div>
</div>

</div>

</body>

</html>