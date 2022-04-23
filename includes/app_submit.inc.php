<?php

function isValid($str)
{
    return preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
}

if (isset($_POST['submit_app'])) {

    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $reason = $_POST['textarea_reason'];

    require_once 'dfunctions.inc.php';
    require_once 'functions.inc.php';

    if ($days < 0) {
        header("location: ../php/app_submit.php?error=incorrectDates");
        exit();
    }


    if (isValid($reason)) {
        header("location: ../php/app_submit.php?error=invalidCharacters");
        exit();
    }

    session_start();
    if (isset($_SESSION["id"])) {
        applicationInsert($_SESSION["id"], $startDate, $endDate, $reason);
        header("location: ../php/applications.php?applicationSubmitted");
        echo "Your application is submitted";
    } else {
        header("location: ../php/login.php?internalerror");
    }
} else {
    header("location: ../php/app_submit.php?error=submissionFailed");
    exit();
}
