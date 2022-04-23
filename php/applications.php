<?php
include_once 'header.php';
?>


<h2 style="text-align: center;">Your Applications</h2>

<form action="app_submit.php" method="post">
    <button type="submit" name="app_submit">Submit a Request</button>
</form>






<table border="1" cellspacing="8" id="table_of_applications">
    <caption>Your applications</caption>
    <tr>
        <th>Date Submitted</th>
        <th>Dates Requested</th>
        <th>Days Requested</th>
        <th>Status</th>
    </tr>

    <?php

    require_once '../includes/functions.inc.php';
    require_once '../includes/dfunctions.inc.php';


    if (isset($_SESSION['type'])) {
        if ($_SESSION["type"] == "0") {
            if (isset($_SESSION["id"])) {

                $application = getApplications($_SESSION["id"]);

                if ($application == false || mysqli_num_rows($application) == 0) {
                    return false;
                } else {
                    while ($temp_application = mysqli_fetch_assoc($application)) {

                        $days_requested = checkDates($temp_application['dateFrom'], $temp_application['dateTo']);
                        echo printRowApp($temp_application['submitDay'], $temp_application['dateFrom'] . " - " . $temp_application['dateTo'], $days_requested, $temp_application['status']);
                    }
                }
            }
        }
    }


    ?>

</table>

<?php
include_once 'footer.php';
?>