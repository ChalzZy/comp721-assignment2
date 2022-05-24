<?php
    //----------------
    // Charles Monaghan 18012390
    // Retrieves booking.html data from booking.js POST request.
    // Inserts data into MYSQL database
    // Echo's back HTML
    //----------------

    // retrieve data from booking.js
    $cname = $_POST['cname'];
    $phone = $_POST['phone'];
    $unumber = $_POST['unumber'];
    $snumber = $_POST['snumber'];
    $stname = $_POST['stname'];
    $sbname = $_POST['sbname'];
    $dsbname = $_POST['dsbname'];
    $date = $_POST['date'];
    $time = $_POST['time'];

	require_once('../../conf/booking.php');

	// database connection
	$conn = mysqli_connect($sql_host,
	$sql_user,
	$sql_pass,
	$sql_db
	);

    // formatting the BRN number
    $ref = "SELECT ref FROM `booking` ORDER BY id DESC LIMIT 1"; 
    $refResult = $conn->query($ref);
    $bookingReference = 99999;
    if ($refResult->num_rows > 0) {
        while($row = $refResult->fetch_assoc()) {
            $num = preg_replace('[\D]', '', $row['ref']);
            $bookingReference = "BRN" . sprintf('%05d', ++$num);
        }
    } else {
        $bookingReference = "BRN00001";
    }

    // insert booking into the database
    $sql = "INSERT INTO `booking`(`ref`, `cname`, `phone`, `unumber`, `snumber`, `stname`, `sbname`, `dsbname`, `date`, `time`, `status`) VALUES ('".$bookingReference."','".$cname."','".$phone."','".$unumber."','".$snumber."','".$stname."','".$sbname."','".$dsbname."','".$date."','".$time."', false)";
    $result = $conn->query($sql);
    echo "  <div class=\"alert alert-success\" role=\"alert\">
                <h3><b>Thank you for your booking!</b></h3>
                <p>Booking Reference Number: ".$bookingReference."</p>
                <p>Pickup time: ".$time."</p>
                <p>Pickup Date: ".$date."</p>
            </div>"
?>