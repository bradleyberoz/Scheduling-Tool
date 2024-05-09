<?php

include("../includes/connect.php");
$vacationDate = $_POST['vacationDate'];
$employeeId = $_POST['employeeId'];

$sql = "INSERT INTO Vacation (employeeid, date) VALUES ('$employeeId', '$vacationDate')";
$smeConn->query($sql);
$sql_del = "DELETE FROM VacationRequests WHERE employeeid = '$employeeId' AND date = '$vacationDate'";
$smeConn->query($sql_del);

echo "Vacation request has been approved.";

?>
