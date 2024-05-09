<?php

include("../includes/connect.php");
$action = $_POST['action'];
$eventId = $_POST['eventId'];
$employeeId = $_POST['employeeId'];

if ($action === 'remove') {
    $sql = "DELETE FROM Workers WHERE event = $eventId AND employee = $employeeId";
    $smeConn->query($sql);
    echo "removed";
} else {
    $sql = "INSERT INTO Workers (event, employee) VALUES ($eventId, $employeeId)";
    $smeConn->query($sql);
    echo "added";
}

?>
