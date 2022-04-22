<?php

$current_users = 0;
$current_applications = 0;

// Connects to DB epignosis if it does exist. Otherwise it gets created, then it connects.
// Returns the connection with the DB
function connectDB()
{
    $sname = "localhost";
    $username = "root";
    $password = "";
    $dname = "epignosis";

    $is_connected = mysqli_connect($sname, $username, $password); //conect to localhost
    $query = "CREATE DATABASE IF NOT EXISTS epignosis";
    mysqli_query($is_connected, $query); //excecute query to create db
    mysqli_close($is_connected);
    $is_connected = mysqli_connect($sname, $username, $password, $dname);

    if (!$is_connected) {
        die("Connection Failed: " . mysqli_connect_error());
    } else {
        return $is_connected;
    }
}

// Needs as argument the connection with the DB. Creates table named users and adds 10 of them if they do not exist. Returns nothing just trust its working.
function initDB($is_connected)
{

    try {
        // add table Users to db
        $query = "CREATE TABLE users ( accountID INT(30) PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, account_type VARCHAR(30) NOT NULL )";
        mysqli_query($is_connected, $query);
        $query = "INSERT INTO users VALUES (0, 'admin', 'admin', 'admin', 'admin@epignosis.admin.com', '1');";
        $query .= "INSERT INTO users VALUES (1, 'George', 'Alivertis', '123567', 'George@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (2, 'Panagiotis', 'Anastasiadis', 'Panagiotis', 'Panagiotis@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (3, 'Giannis', 'Tzortzakis', 'zsdvdaf', 'Giannis@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (4, 'Nikos', 'Stathakis', 'x123xaz', 'Nikos@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (5, 'Tasos', 'Karagianopoulos', 'v25cqW', 'Tasos@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (6, 'Marios', 'Alivertis' , '2V5# 24 5 ', 'Marios@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (7, 'Sofia', 'Gounari' ,':-)', 'Sofia@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (8, 'Maria', 'Gounari' ,'empty', 'Maria@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (9, 'Eleni', 'Andreou' ,'DROP DATABASE', 'Eleni@epignosis.com', '0');";
        $query .= "INSERT INTO users VALUES (10, 'Euthimia', 'Panagiotopoulou','admin', 'Euthimia@epignosis.com', '0');";
        mysqli_multi_query($is_connected, $query);
        $GLOBALS['current_users'] = 11;
    } catch (Exception $e) {
        // If table exists comes here.
    }

    try {
        // add table applications to db
        $query = "CREATE TABLE applications ( accountID INT(30) PRIMARY KEY NOT NULL, submitDay VARCHAR(30) NOT NULL, dateFrom VARCHAR(30) NOT NULL, dateTo VARCHAR(30) NOT NULL, reason VARCHAR(500) NOT NULL, status VARCHAR(30) NOT NULL)";
        mysqli_query($is_connected, $query);
        $query = "INSERT INTO applications VALUES (1, '22/04/2022', '05/06/2022', '25/06/2022', 'I want to take a trip to Ohio', 'Pending');";
        $query .= "INSERT INTO applications VALUES (1, '17/06/2021', '17/07/2021', '27/07/2021', 'I will be moving into a new house and need time to do it', 'Accepted');";
        $query .= "INSERT INTO applications VALUES (1, '13/12/2020', '24/12/2020', '04/01/2021', 'Christmas vacation', 'Accepted');";
        $query .= "INSERT INTO applications VALUES (1, '28/09/2020', '29/09/2020', '03/10/2020', 'Need some time of because my mother died', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (1, '26/07/2020', '06/08/2020', '08/08/2020', 'I need to take some time off for my birthday party', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (3, '24/07/2020', '27/07/2020', '07/08/2020', 'I want to go to Moscow, need some free time. Thanks!', 'Accepted');";
        $query .= "INSERT INTO applications VALUES (3, '05/01/2020', '16/01/2020', '17/01/2020', 'I am getting married and will need the day off', 'Accepted');";
        $query .= "INSERT INTO applications VALUES (2, '01/01/2020', '05/01/2020', '09/01/2020', 'I need extra christmas holidays', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (2, '20/12/2018', '05/01/2019', '09/01/2019', 'I need extra christmas holidays', 'Accepted');";
        $query .= "INSERT INTO applications VALUES (2, '05/06/2018', '16/06/2018', '29/08/2018', 'Oops sent the same application twice, sorry!!', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (2, '05/06/2018', '16/06/2018', '29/08/2018', 'Summer Vacation requested', 'Accepted');";
        mysqli_multi_query($is_connected, $query);
        $GLOBALS['current_applications'] = 11;
    } catch (Exception $e) {
        // If table exists comes here.
    }
}

function getApplications($is_connected, $accountID)
{
    return mysqli_query($is_connected, "SELECT * FROM requests where accountID = $accountID ORDER BY submitDay DESC;");
}

function printApplications($is_connected, $accountID){

    $application = getApplications($is_connected, $accountID);

    while ($temp_application = mysqli_fetch_assoc($application)) {
        $submitDay = $temp_application['submitDay'];
        $dateFrom = $temp_application['dateFrom'];
        $dateTo = $temp_application['dateTo'];
        $status = $temp_application['status'];
    }
}

// Checks if user with $temp_email and $temp_password exists in DB. If true then returns result_set otherwise return false
function userLoginCheck($is_connected, $temp_email, $temp_password)
{
    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE email = ? and password = ?;")) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $temp_email, $temp_password);

    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);

    $results = mysqli_fetch_assoc($result_set);

    if ($result_set == false || mysqli_num_rows($result_set) == 0) {
        return false;
    } else {
        session_start();
        $_SESSION['type'] = $results['account_type'];
        $_SESSION['id'] = $results['accountID'];

        return $result_set;
        
    }

    mysqli_stmt_close($stmt);

}

function userSignUpCheck($is_connected, $temp_email)
{
    //$stmt = mysqli_stmt_init($is_connected);

    //if (!mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE email = ?;")) {
    //    header("location: ../index.php?error=stmtfailedsignup$temp_email");
    //    exit();
    //}

    $query = "SELECT * FROM users WHERE email = '$temp_email';";
    $result_set = mysqli_query($is_connected, $query);

    //mysqli_stmt_bind_param($stmt, "s", $temp_email);

    //mysqli_stmt_execute($stmt);

    //$result_set = mysqli_stmt_get_result($stmt);

    if ($result_set == false) {
        return true;
    } else {
        return $result_set;
    }
}

// Inserts a new User / admin inside the DB. Checks if he/she exists first
function userInsert($is_connected, $temp_firstName, $temp_last_Name, $temp_email, $temp_password, $temp_accountType)
{
    $current_users = intval($GLOBALS['current_users']);

    $temp_account = intval($temp_accountType);

    $query = "INSERT INTO users VALUES ($current_users, '$temp_firstName', '$temp_last_Name','$temp_password', '$temp_email', $temp_account);";
    mysqli_query($is_connected, $query);
    $GLOBALS['current_users'] = $GLOBALS['current_users'] + 1;
}

// Prints given result set
function printResult($result_set)
{
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        print_r($row);
    }
}
