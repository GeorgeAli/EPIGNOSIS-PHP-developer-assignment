<?php
include_once 'header.php';
?>

<h2 style="text-align: center;">The Employees</h2>
    
    <form action="signup.php" method="post">
        <button type="submit" name="singup">Create a User</button>
    </form>

    <table border="1" cellspacing = "8" id="table_of_users" style="    margin-left: auto; margin-right: auto; ">
    <caption>Employees</caption>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Edit</th>
    </tr>

    <?php 

        require_once '../includes/functions.inc.php';
        require_once '../includes/dfunctions.inc.php';


        if(isset($_SESSION['type'])){
            if($_SESSION["type"] == "1"){

                    //kapoia while
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");

            }

        }


    ?>

</table>








<?php
include_once 'footer.php';
?>