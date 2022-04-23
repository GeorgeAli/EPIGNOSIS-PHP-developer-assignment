<?php
include_once 'header.php';
?>

<h2 style="text-align: center;">The Employees</h2>

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

                            echo printRowUsers($temp_user['firstname'], $temp_user['lastname'], $temp_user['email'], $type);
                        }
                    }
                }
            }
        }

?>

    </tbody>
</table>



<?php
include_once 'footer.php';
?>