<?php session_start(); ?>
<?php
if(!isset($_SESSION['usertype']) || ($_SESSION['usertype']!="Admin")){
        echo "<script>alert('You dont have permission to view this page!')</script>";
		echo "<script>location.href='index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
        <style>
            .table-container {
                margin: auto; 
                max-width: 95%;
                padding: 20px; 
            }
            
            table {
                width: 100%;
            }
    
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
    
            th {
                background-color: #f2f2f2;
            }
            
            .black-cell {
                background-color: black;
            }
            main{
                margin-bottom: 100px;
            }
            
            .vacation {
                background-color: red;
            }
            
            #green-cell {
                background-color: green; 
            }
            
            #yellow-cell {
                background-color: yellow; 
            }
        </style>
    </head>
    <body>
        <?php include("includes/nav.php"); ?>
        <?php include("includes/connect.php"); ?>
        <?php 
        $sql_employees = "SELECT * FROM Employees WHERE usertype != ? ORDER BY usertype, lastname";
        $stmt_employees = $smeConn->prepare($sql_employees);
        $usertype = 'Admin'; 
        $stmt_employees->bind_param("s", $usertype);
        $stmt_employees->execute();
        $result_employees = $stmt_employees->get_result();
        
        $sql_events = "SELECT * FROM Events ORDER BY date ASC";
        $stmt_events = $smeConn->prepare($sql_events);
        $stmt_events->execute();
        $result_events = $stmt_events->get_result();
        $num_events = $result_events->num_rows;
        
        $sql_vacation = "SELECT * FROM Vacation";
        $stmt_vacation = $smeConn->prepare($sql_vacation);
        $stmt_vacation->execute();
        $result_vacation = $stmt_vacation->get_result();
        $vacation_dates = [];
        while ($row_vacation = $result_vacation->fetch_assoc()) {
            $employee_id = $row_vacation['employeeid'];
            $vacation_dates[$employee_id][] = $row_vacation['date'];
        }
        
        $sql_admin_contact = "SELECT administrator, phone, address FROM Events ORDER BY date ASC";
        $stmt_admin_contact = $smeConn->prepare($sql_admin_contact);
        $stmt_admin_contact->execute();
        $result_admin_contact = $stmt_admin_contact->get_result();
        $admin_contacts = [];
        while ($row_admin_contact = $result_admin_contact->fetch_assoc()) {
            $admin_contacts[] = $row_admin_contact;
        }

        
        ?>
        <main>
            <h1>Admin page</h1>
            <div class="table-container">
                
                <!-- VACATION DAY REQUESTS -->
                <h2>Vacation Day Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Date Requested</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_vacation_requests = "SELECT * FROM VacationRequests";
                        $stmt = $smeConn->prepare($sql_vacation_requests);
                        $stmt->execute();
                        $result_vacation_requests = $stmt->get_result();
                    
                        while ($row_vacation_request = $result_vacation_requests->fetch_assoc()) {
                            $employee_id = $row_vacation_request['employeeid'];
                            $vacation_date = $row_vacation_request['date'];
                    
                            $sql_employee_info = "SELECT * FROM Employees WHERE id = ?";
                            $stmt = $smeConn->prepare($sql_employee_info);
                            $stmt->bind_param("i", $employee_id);
                            $stmt->execute();
                            $result_employee_info = $stmt->get_result();
                            $row_employee_info = $result_employee_info->fetch_assoc();
                            $employee_name = $row_employee_info['lastname'] . ", " . $row_employee_info['firstname'];
                        ?>
                        <tr>
                            <td class="employeeId"><?php echo $employee_id; ?></td>
                            <td><?php echo $employee_name; ?></td>
                            <td class="vacationDate"><?php echo $vacation_date; ?></td>
                            <td>
                                <button class="approveButton" data-vacationdate='<?php echo $row_vacation_request['employeeid']; ?>' data-requestid="<?php echo $row_vacation_request['id']; ?>">Approve</button>
                                <button class="denyButton" data-requestid="<?php echo $row_vacation_request['id']; ?>">Deny</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="table-container">
                <h2>Events</h2>
                <table>
                    
                    <!-- TABLE HEADER (name, phone #, usertype) -->
                    <thead>
                        <tr>
                            <th scope="col">Last, First</th>
                            <th scope="col">Phone #</th>
                            <th scope="col">Server/Preparer</th>
                            <?php
                            include 'includes/eventsClass.php';
                    
                            $events = [];
                    
                            // DISPLAY EVENT NAMES
                            $sql_event_names = "SELECT * FROM Events ORDER BY date ASC";
                            $stmt_event_names = $smeConn->prepare($sql_event_names);
                            $stmt_event_names->execute();
                            $result_event_names = $stmt_event_names->get_result();
                            while ($row_event_name = $result_event_names->fetch_assoc()) {
                                // Create an Event object for each row in the result set
                                $event = new Event($row_event_name['name'], $row_event_name['date'], $row_event_name['administrator'], $row_event_name['phone'], $row_event_name['address']);
                                $events[] = $event;
                                ?>
                                <th scope="col"><?php echo $event->getName(); ?></th>
                                <?php
                            }
                            ?>
                            <th scope="col">TOTAL EVENTS</th>
                        </tr>
                        <tr>
                            <th colspan="3"></th> 
                            <?php
                            // DISPLAY EVENT DATES
                            foreach ($events as $event) {
                                ?>
                                <th scope="col"><?php echo $event->getDate(); ?></th>
                                <?php
                            }
                            ?>
                            <th class="black-cell"></th> 
                        </tr>
                        <tr>
                            <th colspan="3"></th> 
                            <?php 
                            foreach ($events as $event) { 
                                ?>
                                <th scope="col"><?php echo $event->getAdministrator() . ': ' . $event->getPhone(); ?></th>
                                <?php 
                            } 
                            ?>
                            <th class="black-cell"></th> 
                        </tr>
                        <tr>
                            <th colspan="3"></th> 
                            <?php 
                            foreach ($events as $event) { 
                                ?>
                                <th scope="col"><?php echo $event->getAddress(); ?></th>
                                <?php 
                            } 
                            ?>
                            <th class="black-cell"></th> 
                        </tr>
                    </thead>
                    
                    <!-- CELLS FOR ALL EMPLOYEES -->
                    <tbody>
                        <?php
                        $events_array = [];
                        while ($event = $result_events->fetch_assoc()) {
                            $events_array[] = $event;
                        }
                    
                        while ($row = $result_employees->fetch_assoc()) { 
                            $serverSum = 0;
                        ?>
                        <tr>
                            <th scope='row'><?php echo $row['lastname'] . ", " . $row['firstname']; ?></th>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['usertype']; ?></td>
                            <?php
                            foreach ($events_array as $event) { 
                                $event_date = $event['date'];
                                $employee_id = $row['id'];
                                
                                // Check if employee has a vacation day
                                $vacation_day = false;
                                foreach ($vacation_dates[$employee_id] as $vacation_date) {
                                    if ($vacation_date == $event_date) {
                                        $vacation_day = true;
                                        break; 
                                    }
                                }
                                
                                // Check if employee is working that day
                                $sql_check_worker = "SELECT * FROM Workers WHERE employee=? AND event=?";
                                $stmt_check_worker = $smeConn->prepare($sql_check_worker);
                                $stmt_check_worker->bind_param("ii", $row['id'], $event['id']);
                                $stmt_check_worker->execute();
                                $result_check_worker = $stmt_check_worker->get_result();
                                if ($result_check_worker->num_rows > 0) { // displays cell color if employee is working or not
                                    $serverSum++;
                                    $cellColorId = 'green-cell';
                                } else {
                                    $cellColorId = 'yellow-cell';
                                }
                                ?>
                                <?php if ($vacation_day) { 
                                    echo "<td class='vacation'></td>"; 
                                } else {
                                    echo "<td id='$cellColorId' class='submitChange' data-employeerate='{$row['rate']}' data-eventduration='{$event['duration']}' data-employeetype='{$row['usertype']}' data-eventid='{$event['id']}' data-employeeid='{$row['id']}'></td>";
                                }
                                ?>
                            <?php } ?>
                            <td class='sum_total' data-employeeid='<?php echo $row['id']; ?>'><?php echo $serverSum; ?></td>
                        </tr>
                        <?php } ?>
                        
                        <?php 
                        $event_ids = [];
                        while ($row_event_id = $result_events->fetch_assoc()) {
                            $event_ids[] = $row_event_id['id'];
                        }
                        ?>
                        
                        <!-- TOTAL # of PREPARERS FOR A COLUMN -->
                        <tr>
                            <th colspan="2">TOTAL PREP</th>
                            <td class="black-cell"></td>
                            <?php 
                            foreach ($events_array as $event) {
                                $event_id = $event['id'];
                                $sql_sum_preparers = "SELECT COUNT(*) as total_preparers FROM Workers 
                                                    INNER JOIN Employees ON Workers.employee = Employees.id 
                                                    WHERE Workers.event = ? AND Employees.usertype = 'Preparer'";
                                $stmt_sum_preparers = $smeConn->prepare($sql_sum_preparers);
                                $stmt_sum_preparers->bind_param("i", $event_id);
                                $stmt_sum_preparers->execute();
                                $result_sum_preparers = $stmt_sum_preparers->get_result();
                                $row_sum_preparers = $result_sum_preparers->fetch_assoc();
                                $sum_preparers = $row_sum_preparers['total_preparers'];
                                ?>
                                <td class='sum_preparers' data-eventId='<?php echo $event_id; ?>'><?php echo $sum_preparers; ?></td>
                            <?php } ?>
                            <td class='black-cell' >*BLACK*</td>
                        </tr>
                        
                        <!-- TOTAL # of SERVERS FOR A COLUMN -->
                        <tr>
                            <th colspan="2">TOTAL SERVE</th>
                            <td class="black-cell"></td>
                            <?php 
                            foreach ($events_array as $event) {
                                $event_id = $event['id'];
                                $sql_sum_servers = "SELECT COUNT(*) as total_servers FROM Workers 
                                                    INNER JOIN Employees ON Workers.employee = Employees.id 
                                                    WHERE Workers.event = ? AND Employees.usertype = 'Server'";
                                $stmt_sum_servers = $smeConn->prepare($sql_sum_servers);
                                $stmt_sum_servers->bind_param("i", $event_id);
                                $stmt_sum_servers->execute();
                                $result_sum_servers = $stmt_sum_servers->get_result();
                                $row_sum_servers = $result_sum_servers->fetch_assoc();
                                $sum_servers = $row_sum_servers['total_servers'];
                                ?>
                                <td class='sum_servers' data-eventId='<?php echo $event_id;?>'><?php echo $sum_servers; ?></td>
                            <?php } ?>
                            <td class="black-cell">*BLACK*</td>
                        </tr>
                        
                        <!-- TOTAL # of STAFF FOR A COLUMN -->
                        <tr>
                            <th colspan="2">TOTAL STAFF</th>
                            <td class="black-cell"></td>
                            <?php 
                            foreach ($events_array as $event) {
                                $event_id = $event['id'];
                                $sql_total_workers = "SELECT COUNT(*) as total_workers FROM Workers WHERE event=?";
                                $stmt_total_workers = $smeConn->prepare($sql_total_workers);
                                $stmt_total_workers->bind_param("i", $event_id);
                                $stmt_total_workers->execute();
                                $result_total_workers = $stmt_total_workers->get_result();
                                $row_total_workers = $result_total_workers->fetch_assoc();
                                $total_workers = $row_total_workers['total_workers'];
                                ?>
                                <td class='sum_staff' data-eventId='<?php echo $event_id;?>'><?php echo $total_workers; ?></td>
                            <?php } ?>
                            <td class="black-cell">*BLACK*</td>
                        </tr>
                        
                        <!-- TOTAL COST FOR A COLUMN -->
                        <tr>
                            <th colspan="2">TOTAL COST</th>
                            <td class="black-cell">*BLACK*</td>
                            <?php 
                            foreach ($events_array as $event) {
                                $event_id = $event['id'];
                                $sql_total_cost = "SELECT SUM(rate * duration) AS total_cost FROM Workers 
                                                   INNER JOIN Employees ON Workers.employee = Employees.id 
                                                   INNER JOIN Events ON Workers.event = Events.id 
                                                   WHERE Workers.event = ?";
                                $stmt_total_cost = $smeConn->prepare($sql_total_cost);
                                $stmt_total_cost->bind_param("i", $event_id);
                                $stmt_total_cost->execute();
                                $result_total_cost = $stmt_total_cost->get_result();
                                $row_total_cost = $result_total_cost->fetch_assoc();
                                $total_cost = $row_total_cost['total_cost'];
                                ?>
                                <td class='sum_rate' data-eventId='<?php echo $event_id;?>'><?php echo '$' . round($total_cost, 2); ?></td>
                            <?php } ?>
                            <td class="black-cell">*BLACK*</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <script>
            $(document).ready(function () {
                $('.submitChange').click(function (ev) {
                    ev.stopPropagation();
                    var cell = ev.target;
                    
                    var $row = $(this).closest('tr');
                    $eventDuration = $(this).data('eventduration');
                    $employeeRate = $(this).data('employeerate');
                    $usertype = $(this).data('employeetype');
                    $eventId = $(cell).data('eventid');
                    $employeeId = $(cell).data('employeeid');
                    
                    if ($(cell).attr('id') === 'green-cell') {
                        $action = 'remove';
                    } else {
                        $action = 'add';
                    }
                    
                    $.ajax({
                        url: "scripts/ajax_update_table.php",
                        method: "POST",
                        data: {
                            action: $action,
                            eventId: $eventId,
                            employeeId: $employeeId
                        },
                        success: function (response) {
                            if (response === 'removed') { // remove an employee
                                $(cell).removeAttr('id').attr('id', 'yellow-cell'); 
                                if($usertype === 'Server') { // remove server 
                                    $(".sum_servers").each(function(){
                                        if($(this).attr('data-eventid')==$eventId){
                                            $sumServer = parseInt($(this).text());
                                            $sumServer--;
                                            $(this).text($sumServer)
                                        }
                                    })
                                } else { // remove preparer 
                                    $(".sum_preparers").each(function(){ // remove preparer
                                        if($(this).attr('data-eventid')==$eventId){
                                            $sumPreparers = parseInt($(this).text());
                                            $sumPreparers--;
                                            $(this).text($sumPreparers)
                                        }
                                    })
                                    
                                }
                                $(".sum_staff").each(function(){ // remove staff
                                        if($(this).attr('data-eventid')==$eventId){
                                            $sumStaff = parseInt($(this).text());
                                            $sumStaff--;
                                            $(this).text($sumStaff)
                                        }
                                    })
                                
                                $(".sum_rate").each(function(){ // calculate rate (-)
                                    if($(this).attr('data-eventid')==$eventId){
                                        $sumRate = parseFloat($(this).text().replace('$', ''));
                                        $sumRate = $sumRate - ($eventDuration*$employeeRate);
                                        $(this).text('$' + $sumRate.toFixed(2));
                                    }
                                })
                                
                                $(".sum_total").each(function(){ // remove total events attended by an employee
                                    if($(this).attr('data-employeeid')==$employeeId){ 
                                        $totalEvents = parseInt($(this).text());
                                        $totalEvents--;
                                        $(this).text($totalEvents); 
                                    }
                                });
                                
                            } else { // add an employee
                                $(cell).removeAttr('id').attr('id', 'green-cell');
                                if($usertype === 'Server') { // add server 
                                    $(".sum_servers").each(function(){
                                        if($(this).attr('data-eventid')==$eventId){
                                            $sumServer = parseInt($(this).text());
                                            $sumServer++;
                                            $(this).text($sumServer)
                                        }
                                    })
                                } else { // add preparer 
                                    $(".sum_preparers").each(function(){ // add preparer
                                        if($(this).attr('data-eventid')==$eventId){
                                            $sumPreparers = parseInt($(this).text());
                                            $sumPreparers++;
                                            $(this).text($sumPreparers)
                                        }
                                    })
                                }
                                $(".sum_staff").each(function(){ // add staff
                                    if($(this).attr('data-eventid')==$eventId){
                                        $sumStaff = parseInt($(this).text());
                                        $sumStaff++;
                                        $(this).text($sumStaff)
                                    }
                                })
                                
                                $(".sum_rate").each(function(){ // calculate rate (+)
                                    if($(this).attr('data-eventid')==$eventId){
                                        $sumRate = parseFloat($(this).text().replace('$', ''));
                                        $sumRate = $sumRate + ($eventDuration*$employeeRate);
                                        $(this).text('$' + $sumRate.toFixed(2));
                                    }
                                })
                                
                                $(".sum_total").each(function(){ // add total events attended by an employee
                                    if($(this).attr('data-employeeid')==$employeeId){ 
                                        $totalEvents = parseInt($(this).text());
                                        $totalEvents++;
                                        $(this).text($totalEvents); 
                                    }
                                });
                            }
                        }
                    })
                })
            });
            
            $(document).ready(function() {
                $('.approveButton').click(function() {
                    var row = $(this).closest('tr');
                    $.ajax({
                        url:"scripts/ajax_approve_vacation.php",
                        method:"POST",
                        data:{
                            vacationDate: $(this).closest('tr').find('.vacationDate').text().trim(),
                            employeeId: $(this).closest('tr').find('.employeeId').text().trim()
                        },
                        success:function(response){
                            row.remove();
                        }
                    })
                })
            });
            $(document).ready(function() {
                $('.denyButton').click(function() {
                    var row = $(this).closest('tr');
                    $.ajax({
                        url:"scripts/ajax_deny_vacation.php",
                        method:"POST",
                        data:{
                            vacationDate: $(this).closest('tr').find('.vacationDate').text().trim(),
                            employeeId: $(this).closest('tr').find('.employeeId').text().trim()
                        },
                        success:function(response){
                            row.remove();
                        }
                    })
                })
            });
            
        </script>
        <?php include("includes/footer.php"); ?>
    </body>
</html>