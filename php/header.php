<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>PHP Developer Assignment</title>
    </head>

    <body>
        <div class="head">
            <nav>
                <img src="../media/epignosis.png" class="logo">
                <ul class="nav-links">
                    <?php

                        if(isset($_SESSION["type"])){

                            if($_SESSION["type"] === "1"){
                                echo "<li><a href='../php/users.php'>Employees</a></li>";
                                echo "<li><a href='../includes/logout.inc.php'>Logout</a></li>";
                            }else{
                                echo "<li><a href='../php/applications.php'>Your applications</a></li>";
                                echo "<li><a href='../includes/logout.inc.php'>Logout</a></li>";
                            }
                        }

                    ?>

                </ul>
            </nav>
        </div>

        <div id="container">
            <div id="main">



