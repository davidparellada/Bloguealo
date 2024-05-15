<?php
require 'const.php';

// Conexión con la bd
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_errno($con)) {
    die(mysqli_error($con));
}
