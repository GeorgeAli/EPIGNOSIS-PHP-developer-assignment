<!----
@author John Tzortzakis
login.inc.php checks and handles errors regarding the login prosess. Coded in PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
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
        header("location: ../index.php?error=IncorrectInputs");
    }else{


            if($_SESSION["type"] === "0"){
                header("location: ../php/applications.php");
            }else{
                header("location: ../php/users.php");
            }

        exit();
    }

}else{
    header("location: ../index.php?error=invalidAccess");
    exit();
}