<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
        
        <style>
            .center-form {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                margin-top: 15%;
            }
            .login-form {
                width: 25%;
                border: 1px solid #ced4da; 
                box-shadow: 0 0 10px rgba(0,0,0,0.1); 
                padding: 20px; 
                border-radius: 5px;
            }
        </style>

        <title>Magma Events - Scheduling Application</title>
        
    </head>
    <body>
        <?php include("includes/nav.php"); ?>
        <main>
            <div class="center-form">
                <div class="login-form">
                    <div class="form-outline mb-4">
                        <input type="email" id="usernameField" class="form-control" />
                        <label class="form-label" for="usernameField">Username</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" id="passwordField" class="form-control" />
                        <label class="form-label" for="passwordField">Password</label>
                    </div>
                    <button id="submitSignIn" type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
                </div>
            </div>
        
        
        </main>
        <?php include("includes/footer.php"); ?>
        
        <!-- ASSIGN SESSION VARIABLES AND LOG IN -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                    $('#submitSignIn').click(function() {
                        $username = $('#usernameField').val();
                        $password = $('#passwordField').val();
                        $.ajax({
                            url:"scripts/loginScript.php",
                            method:"POST",
                            data:{
                                un:$username,
                                pw:$password
                            },
                            success:function(response){ // Navigates depending on user type
                                if (response == "server") {
                                    location.href='https://beroz.pwcswebdev.com/Magma_Events/server.php';
                                } else if (response == 'preparer') {
                                    location.href='https://beroz.pwcswebdev.com/Magma_Events/preparer.php';
                                } else if (response == 'admin') {
                                    location.href='https://beroz.pwcswebdev.com/Magma_Events/admin.php';
                                } else {
                                    alert("You have entered the incorrect email/password.");
                                }
                            }
                        })
                    })
                });
        </script>
    </body>

</html>