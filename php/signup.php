<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="../includes/signup.inc.php" method="post">
        <input type="text" name="firstname" placeholder="First name...">
        <input type="text" name="lastname" placeholder="Last name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdconfirm" placeholder="Confirm password...">
        <select name="usertype" id="usertype">
            <option value=0>User</option>
            <option value=1>Admin</option>
        </select>
        <button type="submit" name="submit">Create</button>
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

</section>


<?php
include_once 'footer.php';
?>