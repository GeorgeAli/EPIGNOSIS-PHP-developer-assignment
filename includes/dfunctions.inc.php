<?php

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
        $query = "CREATE TABLE users ( accountID INT(30) AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, acoount_type INT(30) NOT NULL )";
        mysqli_query($is_connected, $query);
        $query = "INSERT INTO users VALUES ('admin', 'admin', 'admin', 'admin@epignosis.admin.com', 1);";
        $query .= "INSERT INTO users VALUES ('George', 'Alivertis', '123567', 'George@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Panagiotis', 'Anastasiadis', 'Panagiotis', 'Panagiotis@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Giannis', 'Tzortzakis', 'zsdvdaf', 'Giannis@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Nikos', 'Stathakis', 'x123xaz', 'Nikos@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Tasos', 'Karagianopoulos', 'v25cqW', 'Tasos@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Marios', 'Alivertis' , '2V5# 24 5 ', 'Marios@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Sofia', 'Gounari' ,':-)', 'Sofia@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Maria', 'Gounari' ,'empty', 'Maria@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Eleni', 'Andreou' ,'DROP DATABASE', 'Eleni@epignosis.com', 0);";
        $query .= "INSERT INTO users VALUES ('Euthimia', 'Panagiotopoulou','admin', 'Euthimia@epignosis.com', 0);";
        mysqli_multi_query($is_connected, $query);
    } catch (Exception $e) {
        // If table exists comes here.
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

    if ($result_set == false || mysqli_num_rows($result_set) == 0) {
        return false;
    } else {
        session_start();
        $_SESSION["type"]; // = (admin || user)
        $_SESSION["id"];    // to id gia na mporw na kanw tis ektipwseis swsta
        return $result_set;
    }
}

function userSignUpCheck($is_connected, $temp_email)
{
    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE email = ?;")) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $temp_email);

    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);

    if ($result_set == false || mysqli_num_rows($result_set) == 0) {
        return false;
    } else {
        return $result_set;
    }
}

// Inserts a new User / admin inside the DB. Checks if he/she exists first

function userInsert($is_connected, $temp_firstName, $temp_last_Name, $temp_email, $temp_password, $temp_accountType)
{
    $stmt = mysqli_stmt_init($is_connected);

    $query = "INSERT INTO users (firstname, lastname, password, email, account_type) VALUES (?, ?, ?, ?, ?);";

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssssi", $temp_firstName, $temp_last_Name, $temp_password, $temp_email, intval($temp_accountType));

        mysqli_stmt_execute($stmt);
    }
}

// Prints given result set
function printResult($result_set)
{
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        print_r($row);
    }
}
