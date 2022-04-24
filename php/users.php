<!----
@author John Tzortzakis
users.php prints the list of users in an HTML table. Coded Bootstrap/HTML/PHP
and functions from functions.inc.php and dfunctions.inc.php respectively
--->

<?php
include_once 'header.php';

if(!isset($_SESSION['id']))
    exit();
?>

<h2 style="text-align: center;">The Employees</h2>

    <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "useralreadyexists") {
                echo "<p>There is a user with this email!</p>";
            }
        }
    ?>

<form action="signup.php" method="post">
    <button type="submit" name="singup">Create a User</button>
</form>

<table class="table">
    <thead>
        <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Type</th>
        <th scope="col">Edit</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    <form action="signup.php" method="post">
    <?php
        require_once '../includes/functions.inc.php';
        require_once '../includes/dfunctions.inc.php';


        if (isset($_SESSION['type'])) {
            if ($_SESSION["type"] == "1") {
                if (isset($_SESSION["id"])) {

                    $user = getUser($_SESSION["id"]);

                    if ($user == false || mysqli_num_rows($user) == 0) {
                        return false;
                    } else {
                        while ($temp_user = mysqli_fetch_assoc($user)) {

                            if (intval($temp_user['account_type']) == 0) {
                                $type = "Employee";
                            } else if (intval($temp_user['account_type']) == 1) {
                                $type = "Admin";
                            }
                            $tempId = $temp_user['accountID'];

                            echo printRowUsers($temp_user['firstname'], $temp_user['lastname'], $temp_user['email'], $type)."<td><button type='submit' name='$tempId' class=\"btn btn-primary\">Edit</button></td></tr>";
                        }
                    }
                }
            }
        }

    ?>
    </form>

    </tbody>
</table>



<?php
include_once 'footer.php';
?>