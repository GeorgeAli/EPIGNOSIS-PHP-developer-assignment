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
function initDB()
{
    initUsers();
    initApplications();
}

function initApplications()
{
    $is_connected = connectDB();

    try {
        // add table applications to db
        $query = "CREATE TABLE applications ( applicationID INT(30) PRIMARY KEY, accountID INT(30), submitDay VARCHAR(30) NOT NULL, dateFrom VARCHAR(30) NOT NULL, dateTo VARCHAR(30) NOT NULL, reason VARCHAR(500) NOT NULL, status VARCHAR(30) NOT NULL)";
        mysqli_query($is_connected, $query);
        $query = "INSERT INTO applications VALUES  (0, 1, '2022-04-22', '2022-06-05', '2022-06-25', 'I want to take a trip to Ohio', 'Pending');";
        $query .= "INSERT INTO applications VALUES (1, 1, '2021-06-17', '2021-07-17', '2021-07-27', 'I will be moving into a new house and need time to do it', 'Approved');";
        $query .= "INSERT INTO applications VALUES (2, 1, '2020-12-13', '2020-12-24', '2021-01-04', 'Christmas vacation', 'Approved');";
        $query .= "INSERT INTO applications VALUES (3, 1, '2020-09-28', '2020-09-29', '2020-10-03', 'Need some time of because my mother died', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (4, 1, '2020-07-26', '2020-08-06', '2020-08-08', 'I need to take some time off for my birthday party', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (5, 3, '2020-07-24', '2020-07-27', '2020-08-07', 'I want to go to Moscow, need some free time. Thanks!', 'Approved');";
        $query .= "INSERT INTO applications VALUES (6, 3, '2020-01-05', '2020-01-16', '2020-01-17', 'I am getting married and will need the day off', 'Approved');";
        $query .= "INSERT INTO applications VALUES (7, 2, '2020-01-01', '2020-01-05', '2020-01-09', 'I need extra christmas holidays', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (8, 2, '2018-12-20', '2019-01-05', '2019-01-09', 'I need extra christmas holidays', 'Approved');";
        $query .= "INSERT INTO applications VALUES (9, 2, '2018-06-05', '2018-06-16', '2018-08-29', 'Oops sent the same application twice, sorry!!', 'Rejected');";
        $query .= "INSERT INTO applications VALUES (10, 2, '2018-06-05', '2018-06-16', '2018-08-29', 'Summer Vacation requested', 'Approved');";
        mysqli_multi_query($is_connected, $query);
    } catch (Exception $e) {
    }
    mysqli_close($is_connected);
}

function initUsers()
{
    $is_connected = connectDB();

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
    } catch (Exception $e) {
    }
    mysqli_close($is_connected);
}

function getApplications($accountID)
{
    $is_connected = connectDB();

    $temp_accountID = intval($accountID);

    return mysqli_query($is_connected, "SELECT * FROM applications where accountID = $temp_accountID ORDER BY submitDay DESC;");

    mysqli_close($is_connected);
}

function getUser($accountID)
{
    $is_connected = connectDB();

    $accountID = intval($accountID);

    return mysqli_query($is_connected, "SELECT * FROM users where accountID <> $accountID;");

    mysqli_close($is_connected);
}

function userUpdate( $accountID, $temp_firstName, $temp_last_Name, $temp_email, $temp_password, $temp_accountType)
{
    $is_connected = connectDB();

    $temp_account = intval($temp_accountType);

    $temp_accountID = intval($accountID);

    $query = "UPDATE users SET firstname = ?, lastname = ?, password = ?, email = ?, account_type = ? WHERE accountID = ?";

    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../index.php?error=stmtfailedInsert");
        mysqli_close($is_connected);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $temp_firstName, $temp_last_Name, $temp_password, $temp_email, $temp_account, $temp_accountID);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($is_connected);
}

// Checks if user with $temp_email and $temp_password exists in DB. If true then returns result_set otherwise return false
function userLoginCheck($temp_email, $temp_password)
{
    $is_connected = connectDB();

    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE email = ? and password = ?;")) {
        header("location: ../index.php?error=stmtfailed");
        mysqli_close($is_connected);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $temp_email, $temp_password);

    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($is_connected);

    if ($result_set == false || mysqli_num_rows($result_set) == 0) {
        return false;
    } else {
        $results = mysqli_fetch_assoc($result_set);
        session_start();
        $_SESSION['type'] = $results['account_type'];
        $_SESSION['id'] = $results['accountID'];
        $_SESSION['email'] = $results['email'];
        $_SESSION['firstname'] = $results['firstname'];
        $_SESSION['lastname'] = $results['lastname'];

        return $result_set;
    }
}

function userSignUpCheck($temp_email)
{
    $is_connected = connectDB();

    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE email = ?;")) {
        header("location: ../index.php?error=stmtfailedsignup");
        mysqli_close($is_connected);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $temp_email);

    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($is_connected);

    if ($result_set == false || mysqli_num_rows($result_set) == 0) {
        return false;
    } else {
        return $result_set;
    }
}

// Inserts a new User / admin inside the DB. Checks if he/she exists first
function userInsert($temp_firstName, $temp_last_Name, $temp_email, $temp_password, $temp_accountType)
{
    $is_connected = connectDB();

    $current_users = mysqli_num_rows(mysqli_query($is_connected, "SELECT * FROM users;"));

    $temp_account = intval($temp_accountType);

    $query = "INSERT INTO  users (accountID, firstname, lastname, password, email, account_type) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../index.php?error=stmtfailedInsert");
        mysqli_close($is_connected);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isssss", $current_users, $temp_firstName, $temp_last_Name, $temp_password, $temp_email, $temp_account);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($is_connected);
}

// Inserts a new application inside the DB.
function applicationInsert($temp_accountID, $temp_dateFrom, $temp_dateTo, $temp_reason)
{
    $is_connected = connectDB();

    $accountID = intval($temp_accountID);

    $temp_status = "Pending";

    $temp_submitDate = date("Y-m-d");

    $current_applications = mysqli_num_rows(mysqli_query($is_connected, "SELECT * FROM applications;"));

    $query = "INSERT INTO applications (applicationID, accountID, submitDay, dateFrom, dateTo, reason, status) VALUES (?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($is_connected);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../index.php?error=stmtfailedInsert");
        mysqli_close($is_connected);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iisssss", $current_applications, $accountID, $temp_submitDate, $temp_dateFrom, $temp_dateTo, $temp_reason, $temp_status);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($is_connected);
}


// Prints given result set
function printResult($result_set)
{
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        print_r($row);
    }
}
