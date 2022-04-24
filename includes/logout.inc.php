<!----
@author John Tzortzakis
logout.inc.php logs out the user and destroys the current session. Coded in PHP.
--->
<?php 
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();