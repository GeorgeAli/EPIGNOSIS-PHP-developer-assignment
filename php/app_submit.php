<!----
@author John Tzortzakis
app_submit.php is a form that allows employess to fill in an application. Coded in HTML/Bootstrap/PHP
and php functions from functions.inc.php and dfunctions.inc.php respectively
--->
<?php
include_once 'header.php';

if(!isset($_SESSION['id']))
    header("location: ../index.php?MinEisaikakosAnthropakos");
    exit();
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

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reason:</label>
            <textarea name="textarea_reason" class="form-control" id="textarea_reason" rows="3" placeholder="(vacation)"></textarea>
        </div>

        <button type="submit" name="submit_app" class="btn btn-primary">Submit</button>

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