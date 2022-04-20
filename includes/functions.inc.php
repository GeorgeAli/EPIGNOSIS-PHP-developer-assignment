<?php


function emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdReapet){

    if(empty($firstname) || empty($lastname) || empty($email) || empty($pwd) || empty($pwdReapet)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function invalidFirstName($firstname){

    if(!preg_match("/^[a-zA-Z]*$/", $firstname)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function invalidLastName($lastname){

    if(!preg_match("/^[a-zA-Z]*$/", $lastname)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function invalidEmail($email){
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function pwdMatch($pwd, $pwdRepeat){

    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function weakPassword($pwd){

    if(strlen($pwd)<4){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function emailExists($is_connected, $email){

    //grapse oti thes edw. O kwdikas apo katw einai semi-finished

    $sql = "SELECT * FROM ";
    $stmt = mysqli_stmt_init($is_connected);

    //the if checks for mistakes
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //there is an error
        header("location: ../index.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}


function userInsert($is_connected, $firstname, $lastname, $email, $pwd, $usertype){
    //grapse oti thes edw. O kwdikas apo katw einai semi-finished. Oysiastika antigrafei apo panw me liges allages

    $sql = ";";
    $stmt = mysqli_stmt_init($is_connected);

    //the if checks for mistakes
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //there is an error
        header("location: ../index.php?error=stmtfailed");
        exit();
    }


    //hashing the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPwd, $usertype); // Kati prepei na ginei(nomizw) me to "ssss" giati to teleytaio einai arithmos

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    
    header("location: ../index.php?error=none");

}


function emptyInputLogin($email, $pwd){

    if(empty($email) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function userLoginCheck($is_connected, $email, $pwd){

}
