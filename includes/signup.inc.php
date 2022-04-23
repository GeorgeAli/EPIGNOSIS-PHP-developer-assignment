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

    $is_connected = connectDB();


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

  //  if (userSignUpCheck($is_connected, $email) !== false) {
 //       header("location: ../index.php?error=useralreadyexists");
 //       exit();
//    }

    if(weakPassword($pwd) !== false){
          header("location: ../php/signup.php?error=weakpassword");
          exit();
    }

    userInsert($is_connected, $firstname, $lastname, $email, $pwd, $usertype);
    header("location: ../php/signup.php?userSignedUp");
    echo "New User Signed Up!\n";
    mysqli_close($is_connected);
} else {
    header("location: ../php/signup.php?signUpFailed");
    exit();
}
