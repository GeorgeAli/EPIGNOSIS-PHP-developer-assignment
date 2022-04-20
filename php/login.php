<?php
    include_once 'php/header.php';
?>

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

    <!--Error handlers-->


<?php
    include_once 'php/footer.php';
?>