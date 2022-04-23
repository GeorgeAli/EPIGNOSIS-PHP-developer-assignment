<?php
include_once 'header.php';
?>


<h2 style="text-align: center;">Your Applications</h2>
    
    <form action="app_submit.php" method="post">
        <button type="submit" name="app_submit">Submit a Request</button>
    </form>


<table class="table">
    <thead>
        <tr>
        <th scope="col">Date Submitted</th>
        <th scope="col">Dates Requested</th>
        <th scope="col">Days Requested</th>
        <th scope="col">Status</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

        <?php 
            require_once '../includes/functions.inc.php';
            require_once '../includes/dfunctions.inc.php';
        
            if(isset($_SESSION['type'])){
                if($_SESSION["type"] == "0"){
                    if(isset($_SESSION["id"])){

                        
                        echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");   
                        echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");   
                        echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");                   
                     }
                }
            }
            
        ?>

    </tbody>
</table>


<!----


<table border="1" cellspacing = "8" id="table_of_applications" style="    margin-left: auto; margin-right: auto;" >
    <caption>Your applications</caption>
    <tr>
        <th>Date Submitted</th>
        <th>Dates Requested</th>
        <th>Days Requested</th>
        <th>Status</th>
    </tr>

    <?php 
/*
        require_once '../includes/functions.inc.php';
        require_once '../includes/dfunctions.inc.php';


        if(isset($_SESSION['type'])){
            if($_SESSION["type"] == "0"){
                if(isset($_SESSION["id"])){
                    //kapoia while

                    echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Approved");
                    echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRowApp("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Pending");
                    
                }
            }

        }

*/
    ?>

</table>

--->

<?php
include_once 'footer.php';
?>