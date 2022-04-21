<?php


if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'functions.inc.php';
    require_once 'dfunctions.inc.php';

    $is_connected = connectDB();
    initDB($is_connected);

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    if (userLoginCheck($is_connected, $email, $pwd) == false) {
        header("location: ../index.php?error=wrongcredentials");
        exit();
    } else {
        header("location: ../index.php");
    }
} else {
    header("location: ../index.php");
    exit();
}
