<?php


if(isset($_POST['submit'])){
    


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdconfirm'];
    $usertype = $_POST['usertype'];

    //Error checking starts here

    require_once 'dfunctions.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdRepeat) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    if(invalidFirstName($firstname) !== false){
        header("location: ../index.php?error=invalifirstname");
        exit();
    }

    if(invalidLastName($lastname) !== false){
        header("location: ../index.php?error=invalidlastname");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../index.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../index.php?error=pwdnotmatch");
        exit();
    }

   // if(emailExists($is_connected, $email) !== false){
  //      header("location: ../index.php?error=usernametaken");
  //      exit();
  //  }

  //  if(weakPassword($pws) !== false){
  //      header("location: ../index.php?error=weakpassword");
  //      exit();
   // }



   // userInsert($is_connected, $firstname, $lastname, $email, $pwd, $usertype);

   header("location: ../index.php?error=none");
    
}else{
   header("location: ../index.php");
   exit();
}

