<?php

if (isset($_POST['submit'])) { 


    //edw mesa tha bei o kwdikas otan patithei to koybi submit
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailfrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "csd4411@csd.uoc.gr";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an e-mail from ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: index.php?mailsend");
} else{
    echo "Error for some reason\n";
}