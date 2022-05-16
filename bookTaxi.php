<?php
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

    echo "<alert>test</alert>";
?>