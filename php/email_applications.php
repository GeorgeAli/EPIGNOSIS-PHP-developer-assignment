<!----
@author John Tzortzakis
@author George Alivertis
email_applications.php prints the vacation emails/requests. Coded in HTML/Bootstrap/PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
<?php
include_once 'header.php';

if(!isset($_SESSION['id'])){

    header("location: ../index.php?MinEisaikakosAnthropakos");
    exit();
}

?>


<?php 

require_once '../includes/functions.inc.php';
require_once '../includes/dfunctions.inc.php';

$pendingApp = getPendingApplications();

while ($temp_application = mysqli_fetch_assoc($pendingApp)) {

    $accountID = $temp_application['accountID'];
    
    $user = getUser($accountID);

    $temp_user = mysqli_fetch_assoc($user);


    $firstname = $temp_user['firstname'];
    $lastname = $temp_user['lastname'];
    $email = $temp_user['email'];
    $reason = $temp_application['reason'];
    $appid = $temp_application['applicationID'];

    echo email_app($email, $firstname, $lastname, $reason, $appid);
}



?>


<?php
include_once 'footer.php';
?>