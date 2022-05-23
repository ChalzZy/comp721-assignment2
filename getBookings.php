<?php
    $bsearch = $_POST['bsearch'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    require_once('../../conf/booking.php');

    // database connection
	$conn = mysqli_connect($sql_host,
	$sql_user,
	$sql_pass,
	$sql_db
	);

    if (strlen($bsearch) > 0) {
        $query = "SELECT * FROM `booking` where ref = '$bsearch'";
        $queryResult = $conn->query($query);
        $output = " ";
        if ($queryResult->num_rows> 0 ) {
            while($row = $queryResult->fetch_assoc()) {
                $currentStatus = "unassigned";
                if ($row["status"] == 1) {
                    $currentStatus = "assigned";
                }
                $output .= "<tr>
                                <th scope=\"row\">".$row["ref"]."</th>
                                <td>".$row["cname"]."</td>
                                <td>".$row["phone"]."</td>
                                <td>".$row["sbname"]."</td>
                                <td>".$row["dsbname"]."</td>
                                <td>".$row["date"].$row["time"]."</td>
                                <td>".$currentStatus."</td>
                                <td><button type=\"button\" class=\"btn btn-primary\">Assign</button></td>
                            </tr>";
            }
            echo $output;
    } elseif ($bsearch == "empty") {
        $query = "SELECT * FROM `booking` WHERE `time` <= CURRENT_TIME + INTERVAL 2 HOUR AND `time` >= CURRENT_TIME AND `date` = CURRENT_DATE AND `status` = 0";
        $queryResult = $conn->query($query);
        $output = "";
        if ($queryResult->num_rows> 0 ) {
            while($row = $queryResult->fetch_assoc()) {
                $currentStatus = "unassigned";
                if ($row["status"] == 1) {
                    $currentStatus = "assigned";
                }
                $output .= "<tr>
                                <th scope=\"row\">".$row["ref"]."</th>
                                <td>".$row["cname"]."</td>
                                <td>".$row["phone"]."</td>
                                <td>".$row["sbname"]."</td>
                                <td>".$row["dsbname"]."</td>
                                <td>".$row["date"].$row["time"]."</td>
                                <td>".$currentStatus."</td>
                                <td><button type=\"button\" class=\"btn btn-primary\">Assign</button></td>
                            </tr>";
            }
            if (empty($output)) {
                echo "No results found";
            } else {
                echo $output;
            }
        }
    } else {
        echo "Your input was incorrect";
     }
    }
?>