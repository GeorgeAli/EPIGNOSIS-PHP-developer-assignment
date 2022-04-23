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

        if (isset($_SESSION['type'])) {
            if ($_SESSION["type"] == "0") {
                if (isset($_SESSION["id"])) {

                    $application = getApplications($_SESSION["id"]);

                    if ($application == false || mysqli_num_rows($application) == 0) {
                        return false;
                    } else {
                        while ($temp_application = mysqli_fetch_assoc($application)) {

                            $dateFrom = new DateTime($temp_application['dateFrom']);
                            $dateTo = new DateTime($temp_application['dateTo']);
                            $days_requested = $dateFrom->diff($dateTo);
                            $days_requested = $days_requested->format('%d days');
    
                            echo printRowApp($temp_application['submitDay'], $temp_application['dateFrom'] . " - " . $temp_application['dateTo'], $days_requested, $temp_application['status']);
                        }
                    }
                }
            }
        }

?>

    </tbody>
</table>




<?php
include_once 'footer.php';
?>