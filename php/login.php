
<?php

    if(isset($_SESSION['header']))
        if($_SESSION['header'] == 0)
            include_once 'header.php';

?>

    <h2>Log in</h2>

    <form action="/epignosis/includes/login.inc.php" method="post" class="text-center">
        <div class="form-group w-50 p-3 text-center">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email...">
        </div>
        <div class="form-group w-50 p-3 text-center">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>



<!--
    
    
    
    <section class="signup-form">
        <h2>Log in</h2>
        <form action="/epignosis/includes/login.inc.php" method="post">
        <input type="text" name="email" placeholder="Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
        </form>
    
        <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }else if($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect login information!</p>";
                }
            }
        ?>
    
    </section>


    -->

    

<?php
    $_SESSION['header'] = 0;
    include_once 'footer.php';
?>