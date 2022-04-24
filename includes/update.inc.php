<!----
@author John Tzortzakis
@author George Alivertis
update.inc.php checks and handles errors regarding the updating prosess. Coded in PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
<?php

require_once 'functions.inc.php';
require_once 'dfunctions.inc.php';

if(isset($_POST['submit'])){
    
    
    session_start();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdconfirm'];
    $usertype = $_POST['usertype'];

    $id = $_SESSION['id_update'];

    if (emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../php/users.php?error=emptyinput");
        exit();
    }

    if (invalidName($firstname) !== false) {
        header("location: ../php/users.php?error=invalidfirstname");
        exit();
    }

    if (invalidName($lastname) !== false) {
        header("location: ../php/users.php?error=invalidlastname");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../php/users.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../php/users.php?error=pwdnotmatch");
        exit();
    }

    if (weakPassword($pwd) !== false) {
        header("location: ../php/users.php?error=weakpassword");
        exit();
    } else {
        userUpdate($id, $firstname, $lastname, $email, $pwd, $usertype);
        header("location: ../php/users.php?userUpdated");
    }
} else {
    header("location: ../php/users.php?UpdateFailed");
    exit();




}
