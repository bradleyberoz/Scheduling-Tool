<?php session_start(); ?>
<?php 
    include("../includes/connect.php");
    
    $username=$_POST['un'];
    $password=$_POST['pw'];
    
    $stmt = $smeConn->prepare("SELECT * FROM Employees WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cost=10;
        $hashedPassword=password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['usertype'] = $row['usertype']; 
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['employee_id'] = $row['id'];
            
            if($_SESSION['usertype'] == 'Admin') {
            echo "admin";
            } else if($_SESSION['usertype'] == 'Server') {
                echo "server";
            } else if($_SESSION['usertype'] == 'Preparer') {
                echo "preparer";
            } else {
                echo "error";
            }
        

        } 
    } 
    
?>
