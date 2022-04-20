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


function emptyInputLogin($email, $pwd){

    if(empty($email) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}
