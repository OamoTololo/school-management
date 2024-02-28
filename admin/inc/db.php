<?php

$database['db_host'] = 'localhost';
$database['db_user'] = 'root';
$database['db_password'] = '';
$database['db_name'] = 'school-management';

foreach ($database as $key => $value) {
    define(strtoupper($key), $value);
}

// Create a database connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check the connection with the database.

?>