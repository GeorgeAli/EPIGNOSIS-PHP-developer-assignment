<!----
@author John Tzortzakis
@author George Alivertis
signup.inc.php checks and handles errors regarding the signup prosess. Coded in PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
<?php


if (isset($_POST['submit'])) {



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdconfirm'];
    $usertype = $_POST['usertype'];

    require_once 'dfunctions.inc.php';
    require_once 'functions.inc.php';

    initDB();

    if (emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../php/signup.php?error=emptyinput");
        exit();
    }

    if (invalidFirstName($firstname) !== false) {
        header("location: ../php/signup.php?error=invalidfirstname");
        exit();
    }

    if (invalidLastName($lastname) !== false) {
        header("location: ../php/signup.php?error=invalidlastname");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../php/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../php/signup.php?error=pwdnotmatch");
        exit();
    }

    if (userSignUpCheck($email) !== false) {
        header("location: ../php/users.php?error=useralreadyexists");
        exit();
    }

    if (weakPassword($pwd) !== false) {
        header("location: ../php/users.php?error=weakpassword");
        exit();
    } else {
        userInsert($firstname, $lastname, $email, $pwd, $usertype);

        header("location: ../php/users.php?userSignedUp");
    }
} else {
    header("location: ../php/signup.php?signUpFailed");
    exit();
}
