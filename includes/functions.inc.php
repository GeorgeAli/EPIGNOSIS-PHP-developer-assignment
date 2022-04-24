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

function invalidName($firstname){

    if(!preg_match("/^[a-z A-Z.]*$/", $firstname)){
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

function email_app($email, $firstname, $lastname, $reason, $appid){
    
    $return_email = "<div>";
    $return_email .= "<p>---------------------------------------------------------</p>";
    $return_email .= "<pre>";
    $return_email .= "<b>From: </b><i>$firstname $lastname </i> ($email)<br><br>";
    $return_email .= $reason."<br><br>";

    $return_email .= "<form action=\"users.php\" method=\"post\">";
    $return_email .= "<button type=\"submit\" name=\"button_appr$appid\" class=\"btn btn-success\">Approve</button>";
    $return_email .=   "<button type=\"submit\" name=\"button_rej$appid\" class=\"btn btn-danger\">Reject</button>";
    $return_email .="</form>";


    $return_email .= "</pre>";
    $return_email .= "<p>---------------------------------------------------------</p>";
    $return_email .= "</div><br>";

    return $return_email;
}
