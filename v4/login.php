<?php
session_start();
$_SESSION['logged_in'] = 1;
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
                                $_SESSION['logged_in'] = 1; 
                                header('Location: view.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
    <style>
        body { background-color: #F0FFF0; }
    </style>
</head>
<body>
    <?php include '../templates/navbar.php'; ?>
    <div class="section">
        <div class="columns">
            <div class="column">
                <form method="post" action="login.php">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="UserName" value="<?php echo htmlspecialchars($username) ?>"placeholder="Username">
                        </p>
                        <div style="color: red"><?php echo $errors['username']; ?></div>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="password" name="MyPass" value="<?php echo htmlspecialchars($password) ?>"placeholder="Password">
                            <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                            </span>
                            <div style="color: red"><?php echo $errors['password']; ?></div>
                        </p>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit" name="submit">Log In</button> 
                            <a class="button is-link is-light" href="index.php">Cancel</a> 
                        </div>
                    </div>   
                </form>  
            </div>
            <div class="column"> </div>
        </div>
    </div>
        
  
</body>
</html>




