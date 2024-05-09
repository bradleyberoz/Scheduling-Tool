<?php session_start(); ?>
<?php
if(!isset($_SESSION['usertype']) || ($_SESSION['usertype']!="Admin" && $_SESSION['usertype']!="Server")){
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
        </style>
    </head>
    <body>
        <?php include("includes/nav.php"); ?>
        <?php include("includes/connect.php"); ?>

        <?php include("scripts/eventsClass.php"); ?>

        <main>
            <h1>Server page</h1>
            <?php
            $employee_id = $_SESSION['employee_id'];
            $sql_schedule = "SELECT Events.name, Events.address, Events.date, Events.duration 
                             FROM Workers 
                             INNER JOIN Events ON Workers.event = Events.id 
                             WHERE Workers.employee = $employee_id";
            $result_schedule = $smeConn->query($sql_schedule);

            if ($result_schedule->num_rows > 0) {
            ?>
            <div class="table-container">
                <h2>Events Registered For:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result_schedule->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['address']; ?> <a href="https://www.google.com/maps/search/<?php echo urlencode($row['address']); ?>" title="View on Google Maps"><i class="bi bi-geo-alt"></i></a></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['duration']; ?> hrs</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <h2>Request a vacation day:</h2>
                <form id="requestVacationForm">
                    <input type="date" id="vacationDate" name="vacationDate" required><br>
                    <input type="submit" value="Request Vacation">
                </form>
            </div>
            <?php } else {
                echo "<p>No events registered for this employee.</p>";
            }
            ?>
            
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#requestVacationForm').submit(function(event){
                $.ajax({
                    type: 'POST',
                    url:"scripts/ajax_request_vacation.php",
                    data: {
                        vacationDate: $('#vacationDate').val(),
                        employeeId: <?php echo $_SESSION['employee_id']; ?>
                    },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
        </script>
        <?php include("includes/footer.php"); ?>
    </body>
</html>