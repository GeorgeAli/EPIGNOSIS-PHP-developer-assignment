<?php
    include_once 'php/header.php';
?>

    <section class="signup-form">
        <h2>Log in</h2>
        <form action="/epignosis/includes/login.inc.php" method="post">
        <input type="text" name="name" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
        </form>
    </section>

    <!--Error handlers-->


<?php
    include_once 'php/footer.php';
?>