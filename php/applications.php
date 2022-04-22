<?php
    
include_once 'php/header.php';
?>


<h2 style="text-align: center;">Your Applications</h2>

<table border="1" cellspacing = "4" id="table_of_applications">
    <caption>Your applications</caption>
    <tr>
        <th>Date Submitted</th>
        <th>Dates Requested</th>
        <th>Days Requested</th>
        <th>Status</th>
    </tr>

    <?php 

        require_once 'includes/functions.inc.php';
        require_once 'includes/dfunctions.inc.php';


        if(isset($_SESSION["type"])){ //amfilegomeno shmeio
            if($_SESSION["type"] == 0){
                if(isset($_SESSION["id"])){
                    //kapoia while
                    echo printRow("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRow("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRow("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Approved");
                    echo printRow("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Rejected");
                    echo printRow("22/4/2022", "24/4/2022 - 24/4/2022", 1, "Pending");
                    
                }
            }

        }

    ?>

</table>

<?php
include_once 'php/footer.php';

?>