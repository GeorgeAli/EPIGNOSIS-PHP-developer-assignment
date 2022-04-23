<?php


if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'functions.inc.php';
    require_once 'dfunctions.inc.php';

    initDB();

    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }


    if(userLoginCheck($email, $pwd) == false){
        header("location: ../index.php?error=noUserFound");
    }else{


            if($_SESSION["type"] === "0"){
                header("location: ../php/applications.php?");
            }else{
                header("location: ../php/signup.php");
            }

        exit();
    }

}else{
    header("location: ../index.php?error=invalidAccess");
    exit();
}