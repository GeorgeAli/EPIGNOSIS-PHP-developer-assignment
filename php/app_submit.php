<?php
include_once 'header.php';
?>

<section >

    <h2>Fill an Application</h2>
    <br>

    <form  action="../includes/app_submit.inc.php" method="post">
    
    
        <label for="start_date">Date From:</label><br>
        <input type="date" id="start_date" name="start_date" value="2022-04-23" min="2022-04-23" max="2024-04-23">

        <br>
        <label for="end_date">Date To:</label>
        <br>
        <input type="date" id="start_date" name="end_date" value="2022-04-23" min="2022-04-23" max="2024-04-23">
        
        <br>
        <label for="reason">Reason:</label>
        <br>
        <textarea id="textarea_reason" name="textarea_reason" rows="5" cols="55" placeholder="(vacation)"></textarea>

        <button type="submit" name="submit_app">Create</button>

    </form>


    <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }else if($_GET["error"] == "incorrectDates"){
                    echo "<p>Incorrect Dates</p>";
                }else if($_GET["error"] == "submissionFailed"){
                    echo "<p>Submission Failed</p>";
                }
            }
        ?>










</section>


<?php
    include_once 'footer.php';
?>