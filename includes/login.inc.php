<?php


if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'functions.inc.php';
    require_once 'dfunctions.inc.php';

    $is_connected = connectDB();
    initDB($is_connected);

    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }


    if(userLoginCheck($is_connected, $email, $pwd) == false){
        header("location: ../php/login.php");
        echo "Something went wrong!\n";
    }else{


            if($_SESSION["type"] === "0"){
                header("location: ../php/applications.php?");
            }else{
                header("location: ../php/users.php");
            }

        exit();
    }

}else{
    header("location: ../index.php?error=invalidAccess");
    exit();
}