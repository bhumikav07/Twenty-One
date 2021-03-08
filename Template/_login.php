
<?php
// Initialize the session
 
// Check if the user is already logged in, if yes then redirect him to welcome page
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: index.php");
//    exit;
//}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["login-username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["login-username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["login-password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["login-password"]);
        echo $password;
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userid, username, password FROM user WHERE username = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $userid, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userid"] = $userid;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            //echo '<script> alert("Successfully logged in") </script>'; 
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 



<section id="login">
    <div class="m-auto">
        <div class="page-title" style="background-color:#ffdc48;">
            <p class="font-opensans text-center font-w-800 "
                style="padding-top:50px; padding-bottom: 50px; font-size:50px;">MY ACCOUNT</p>
        </div>
    </div>
    
            <!--Login form-->
           
                <div class="container contact-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  >
                        <div class="row">
                            <div class="col-md-6 my-5 m-auto">
                                <h3 class="font-poppins font-w-700 font-s-20 " style="padding-top: 20px; margin-left:0;">
                                    LOGIN
                                 </h3>
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="login-username" class="form-control font-poppins font-s-14 font-w-400 rounded-0" placeholder="Username*"
                                    value="<?php echo $username; ?>" style="margin-top:20px;>
                                    <span class="help-block"><?php echo $username_err; ?></span>
                            </div><br>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="login-password" class="form-control font-poppins font-s-14 font-w-400 rounded-0" placeholder="Password*" value="" />
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div><br>
                           
                            <p class="font-poppins font-s-14 font-w-600"> New user? Click here to <a href="register.php">Register</a>
                            <div class="form-group" style>
                                <input type="submit" class="btn btn-banner font-poppins font-s-12 font-w-600 py-2 px-3 w-100" value="LOGIN" />
                            </div>
                            </div><br>
                        </div>
                    </form>
                </div>
            

            <!--!Login form-->
</section>
