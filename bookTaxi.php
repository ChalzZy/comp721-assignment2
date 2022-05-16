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

    //INSERT INTO `booking`(`ref`, `cname`, `phone`, `unumber`, `snumber`, `stname`, `sbname`, `dsbname`, `date`, `time`, `status`) VALUES ('BRN00000','Test Name','123456789','24','15','test street','test suburb','test dest suburb','17/05/2022','22:04', false)
    $sql = "INSERT INTO `booking`(`ref`, `cname`, `phone`, `unumber`, `snumber`, `stname`, `sbname`, `dsbname`, `date`, `time`, `status`) VALUES ('1','".$cname."','".$phone."','".$unumber."','".$snumber."','".$stname."','".$sbname."','".$dsbname."','".$date."','".$time."', false)";
    $result = $conn->query($sql);
    
    echo "<alert>test</alert>";
?>