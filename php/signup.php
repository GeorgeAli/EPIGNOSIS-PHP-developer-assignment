<?php
include_once 'header.php';
?>

    <h2>Sign Up</h2>


    <form action="../includes/signup.inc.php" method="post">
    <div class="form-group w-50 p-3">
            <label for="first_name">First Name</label>
            <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="First Name...">
        </div>
        <div class="form-group w-50 p-3">
            <label for="last_name">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Last Name...">
        </div>
        <div class="form-group w-50 p-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
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
            <option value=0>Employee</option>
            <option value=1>Admin</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
    </form>
    
    
    
    <!----
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    
    <form action="../includes/signup.inc.php" method="post">
        <input type="text" name="firstname" placeholder="First name...">
        <input type="text" name="lastname" placeholder="Last name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdconfirm" placeholder="Confirm password...">
        <select name="usertype" id="usertype">
            <option value=0>Employee</option>
            <option value=1>Admin</option>  
        </select>
        <button type="submit" name="submit">Create</button>
    </form>
    

---->


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