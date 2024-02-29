<?php
ob_start();
session_start();
require_once('inc/db.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $userPassword = mysqli_real_escape_string($connection, $_POST['password']);

    $getUser = "SELECT * FROM users WHERE username = '$username' && user_password = '$userPassword '";
    $runGetUserQuery = mysqli_query($connection, $getUser);
    $checkUser = mysqli_num_rows($runGetUserQuery);

    if ($checkUser > 0) {
        $_SESSION['username'] = $username;
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        echo "<script>alert('Username or Password is not correct. Try again...')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>School Management</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet"/>

    <script>
        body{
            font-family: 'Raleway', sans-serif;
        }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action=""method="post">
                    <h2 class="text-danger text-center">Admin</h2>
                    <label class="text-danger mt-2" for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username"
                           id="username" autocomplete="off" required>
                    <label class="text-danger mt-3" for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>

                    <button class="btn btn-success btn-block mt-3" type="submit" name="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>