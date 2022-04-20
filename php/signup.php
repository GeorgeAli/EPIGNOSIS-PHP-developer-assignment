<?php
    include_once 'php/header.php';
?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <form action="/epignosis/includes/signup.inc.php" method="post">
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
    </section>

    <!--Error handlers-->


<?php
    include_once 'php/footer.php';
?>