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

    //SELECT * FROM `booking` WHERE time >= CURRENT_TIME-2 AND date = CURRENT_DATE
    $query = "SELECT * FROM `booking` WHERE time >= CURRENT_TIME-2 AND date = CURRENT_DATE";
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
    } else {
        echo "no results";
    }

    // if ($bsearch == "") {
    //     echo "empty".$date.$time;
    // }

?>