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
        
            if(isset($_SESSION['type'])){
                if($_SESSION["type"] == "1"){

                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                    echo printRowUsers("Giannis", "Tzortzakis", "Giannis@epignosis.com", "Employee");
                }
            }
            
        ?>

    </tbody>
</table>



<?php
include_once 'footer.php';
?>