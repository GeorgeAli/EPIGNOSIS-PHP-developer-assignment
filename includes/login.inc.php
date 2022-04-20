<?php


if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dfunctions.inc.php';
    require_once 'dfunctions.inc.php';

    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    userLoginCheck($is_connected, $email, $pwd);

}else{
    header("location: ../index.php");
    exit();
}