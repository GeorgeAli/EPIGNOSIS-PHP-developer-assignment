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

    $result_set = userLoginCheck($is_connected, $email, $pwd);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        print_r($row);
    }

    if($result_set == false){
        echo "lathow\n\n";
    }else{
        header("location: ../index.php");
        exit();
    }

}else{
    header("location: ../index.php");
    exit();
}