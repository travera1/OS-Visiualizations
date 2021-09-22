 <?php
    session_start();
    $_SESSION['loggedin'] = 0;
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $message = "";
$errors =array('username' => '', 'password' => '');
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = trim($_POST["UserName"]);
        $password = trim($_POST["MyPass"]);

       
       
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM admins WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $h_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if($password == $h_password){
                                // Password is correct Display a message that it's OK
                                $_SESSION['loggedin'] = 1; 
                                header('Location: view.php');
                                exit();
                            } else{
                                // Display an error message if password is not valid
                                $message = "The password you entered was not valid.";
                                $errors['password']=$message;
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $message = "No account found with that username.";
                        $errors['username']=$message;
                    }           
                } 

                // Close statement
                mysqli_stmt_close($stmt);
            }
         
    // Close connection
    mysqli_close($link);
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style>
        body { background-color: #F0FFF0; }
    </style>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div >
        <CENTER >Log In
            <form method="post" action="login.php">
                    <p>User Name:
                    <input type="text" name="UserName" value="<?php echo htmlspecialchars($username) ?>">
                    <div style="color: red"><?php echo $errors['username']; ?></div>
                    <p>Password:
                    <input type="text" name="MyPass" value="<?php echo htmlspecialchars($password) ?>">
                    <div style="color: red"><?php echo $errors['password']; ?></div>
                    <p>
                    <input type="submit" id="submit" value="Submit">
            </form>
        </CENTER>
    </div>
    

</body>
</html>




