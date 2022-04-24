<!----
@author John Tzortzakis
finctions.inc.php contains functions that are used throughout the program for error checking and printing. Coded in PHP.
--->
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

function printElement($element, $color = "white"){

    $str = "<td bgcolor=$color>$element</td>";

    return $str;
}

function printRowApp($date_sub, $dates_req, $days_req, $status){

    $row = "<tr>".printElement($date_sub).printElement($dates_req).printElement($days_req);

    if(strcmp($status, "Pending") == 0){
        $row .= printElement($status, "yellow");
    }
    else if(strcmp($status, "Approved") == 0){
        $row .= printElement($status, "#6fec73");
    }
    else if(strcmp($status, "Rejected") == 0){
        $row .= printElement($status, "#f64444");
    }
    else{
        $row = "error";
    }

    return $row."</tr>";
}

function printRowUsers($firstname, $lastname, $email, $type){

    $row = "<tr><th class=\"font-weight-normal\">$firstname</th>";

    $row .= printElement($lastname).printElement($email).printElement($type);

    return $row;

}
