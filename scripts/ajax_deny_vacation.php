<?php

include("../includes/connect.php");
$vacationDate = $_POST['vacationDate'];
$employeeId = $_POST['employeeId'];

$sql_del = "DELETE FROM VacationRequests WHERE employeeid = '$employeeId' AND date = '$vacationDate'";
$smeConn->query($sql_del);

echo "Vacation request has been denied.";

?>
