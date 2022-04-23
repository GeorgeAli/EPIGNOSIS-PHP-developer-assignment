<?php 

function isValid($str) {
    return preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
}

if(isset($_POST['submit_app'])){

    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $reason = $_POST['textarea_reason'];
    $curDate = date('d-m-Y');
    
    
    
    require_once 'dfunctions.inc.php';
    require_once 'functions.inc.php';
    
    $days_requested = checkDates($startDate, $endDate);
    $startDate = date("d-m-Y", strtotime($startDate));
    $endDate = date("d-m-Y", strtotime($endDate));
    
    if($days < 0){
        header("location: ../php/app_submit.php?error=incorrectDates");
        exit();
    }


    if(isValid($reason)){
        header("location: ../php/app_submit.php?error=invalidCharacters");
        exit();
    }

    //applicationsSubmit($is_connected, $startDate, $endDate, $cur_date, $days_requested, $reason); na ginei to submit stin sql
    header("location: ../php/applications.php?applicationSubmitted");
    echo "Your applications is submitted";
    //mysqli_close($is_connected);
}else{
    header("location: ../php/app_submit.php?error=submissionFailed");
    exit();
}