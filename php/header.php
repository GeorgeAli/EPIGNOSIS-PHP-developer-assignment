<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="css/style.css">
        <title>PHP Developer Assignment</title>
    </head>

    <body>
        <div class="head">
            <nav>
                <img src="media/epignosis.png" class="logo">
                <ul class="nav-links">
                    <?php 

                        if(isset($_SESSION["type"])){

                            if($_SESSION["type"] == 0){
                                echo "<li><a href='php/applications.php'>Applications</a></li>";
                                echo "<li><a href='php/signup.php'>Signup</a></li>";
                                echo "<li><a href='php/logout.php'>Logout</a></li>";
                            }else{
                                echo "<li><a href=\"\">Request</a></li>";
                                echo "<li><a href='php/logout.php'>Logout</a></li>";
                            }
                        }
                        
                    ?>
                
                </ul>
            </nav>
        </div>


        <div class="wrapper">