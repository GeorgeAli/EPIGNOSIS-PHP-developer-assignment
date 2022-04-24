<!----
@author John Tzortzakis
@author George Alivertis
signup.php is a form that allows admins to signup new users. Coded in HTML/Bootstrap/PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->

<?php
include_once 'header.php';

if(!isset($_SESSION['id'])){

    header("location: ../index.php?MinEisaikakosAnthropakos");
    exit();
}
?>

    <h2>Sign Up</h2>

    <form action="../includes/signup.inc.php" method="post">
    <div class="form-group w-50 p-3">
        <label for="first_name">First Name</label>

        <input type="text" name="firstname" class="form-control" value='' id="exampleFormControlInput1" placeholder="First Name...">
                
        </div>
        <div class="form-group w-50 p-3">
            <label for="last_name">Last Name</label>
            <?php echo "<input type=\"text\" name=\"lastname\" class=\"form-control\" value='' id=\"exampleFormControlInput1\" placeholder=\"Last Name...\">"; ?>
        </div>
        <div class="form-group w-50 p-3">
            <label for="email">Email</label>
            <?php echo "<input type=\"text\" name=\"email\" class=\"form-control\" value='' id=\"exampleFormControlInput1\" placeholder=\"Email\">";?>
            
        </div>
        <div class="form-group w-50 p-3">
            <label for="password">Password</label>
            <input type="password" name="pwd" class="form-control" id="exampleFormControlInput1" placeholder="Password">
        </div>
        <div class="form-group w-50 p-3">
            <label for="password_confirm">Confirm the Password</label>
            <input type="password" name="pwdconfirm" class="form-control" id="exampleFormControlInput1" placeholder="Confirm password">
        </div>
        
        <div class="form-group w-50 p-3">
            <label for="exampleFormControlSelect1">Type of User</label>
            <select name="usertype" class="form-control" id="exampleFormControlSelect1">

                <?php 
                    if($tp == 0){
                        echo "<option value=0>Employee</option><option value=1>Admin</option>";
                    }else{
                        echo "<option value=1>Admin</option><option value=0>Employee</option>";
                    }
                ?>

            </select>
        </div>
        <?php echo "<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Create</button>";?>
        
    </form>
    

    <?php

    if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        } else if ($_GET["error"] == "invalifirstname") {
            echo "<p>Invalid First Name!</p>";
        } else if ($_GET["error"] == "invalidlastname") {
            echo "<p>Invalid Last Name!</p>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Invalid Email!</p>";
        } else if ($_GET["error"] == "pwdnotmatch") {
            echo "<p>Passwords doesn't match!</p>";
        } else if ($_GET["error"] == "useralreadyexists") {
            echo "<p>User already exists!</p>";
        } else if ($_GET["error"] == "weakpassword") {
            echo "<p>Password must have 5+ characters!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You signed up succesfully!</p>";
        }
    }
    ?>




<?php
include_once 'footer.php';
?>