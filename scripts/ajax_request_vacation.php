<?php

include("../includes/connect.php");
$vacationDate = $_POST['vacationDate'];
$employeeId = $_POST['employeeId'];

$sql = "INSERT INTO VacationRequests (employeeid, date) VALUES ('$employeeId', '$vacationDate')";
$smeConn->query($sql);
echo "Vacation day has been added!";

?>
