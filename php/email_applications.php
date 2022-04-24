<!----
@author John Tzortzakis
@author George Alivertis
email_applications.php prints the vacation emails/requests. Coded in HTML/Bootstrap/PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
<?php
include_once 'header.php';

if(!isset($_SESSION['id']))
    exit();

?>


<?php 

require_once '../includes/functions.inc.php';
require_once '../includes/dfunctions.inc.php';



?>

<div>
    <p>---------------------------------------------------------</p>
    <pre>
    <b>Form: </b><i>lastname firstname</i> (email)
    
    
    Email_body
    
    </pre>
    <form action="users.php" method="post">
        <button type="submit" name="button_apr" class="btn btn-success">Approve</button>
        <button type="submit" name="button_rej" class="btn btn-danger">Reject</button>
    </form>
    <p>---------------------------------------------------------</p>
</div>

<?php
include_once 'footer.php';
?>