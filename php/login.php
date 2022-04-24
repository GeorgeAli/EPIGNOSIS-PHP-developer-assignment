
<?php

    if(isset($_SESSION['header']))
        if($_SESSION['header'] == 0)
            include_once 'header.php';

?>

    <h2>Log in</h2>

    <form action="/epignosis/includes/login.inc.php" method="post">
        <div class="form-group w-50 p-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email...">
        </div>
        <div class="form-group w-50 p-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>


    <?php 
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }else if($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }else if($_GET["error"] == "IncorrectInputs"){
                echo "<p>Incorrect Inputs! Make sure your email and password are correct</p>";
            }
        }
    ?>
    

<?php
    $_SESSION['header'] = 0;
    include_once 'footer.php';
?>