
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST['register-username']))){
        $username_err = "Please enter a username.";
        //echo '<script>alert("Please enter a username")</script>';
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["register-username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                    //echo '<script>alert("This username is already taken.")</script';  
                } else{
                    $username = trim($_POST["register-username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["register-password"]))){
        $password_err = "Please enter a password.";
        //echo '<script>alert("Please enter a password.")</script';     
    } elseif(strlen(trim($_POST["register-password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
        //echo '<script>alert("Password must have atleast 8 characters.")</script';
    } else{
        $password = trim($_POST["register-password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm-register-password"]))){
         $confirm_password_err = "Please confirm password.";
        //echo '<script>alert("Please confirm password.")</script';
    } else{
        $confirm_password = trim($_POST["confirm-register-password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
            //echo '<script>alert("Password did not match.")</script';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                $sucmsg="Successfully registered and logging you in";
                echo  $sucmsg;
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
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

    <!--Register form-->
    <div class="container contact-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="row">
                            <div class="col-md-7 my-5 m-auto">
                                <h3 class="font-poppins font-w-700 font-s-20" style="padding-top: 20px;margin-left:0;">
                                    REGISTER
                                 </h3>
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="register-username" class="form-control font-poppins font-s-14 font-w-400 rounded-0" placeholder="Username*"
                                    value="<?php echo $username; ?>" style="margin-top:20px;font-family: "' Poppins' , sans-serif"/>
                                    <span class="help-block"><?php echo $username_err; ?></span>
                            </div><br>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="register-password" class="form-control font-poppins font-s-14 font-w-400 rounded-0" placeholder="New Password*" value="<?php echo $password; ?>" />
                                <span class="help-block font-poppins font-s-14 font-w-400"><?php echo $password_err; ?></span>
                            </div><br>
                            <div class="form-group  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="confirm-register-password" class="form-control font-poppins font-s-14 font-w-400 rounded-0" placeholder="Confirm Password*" value="<?php echo $confirm_password; ?>" />
                                <span class="help-block font-poppins font-s-14 font-w-400"><?php echo $confirm_password_err; ?></span>
                            </div><br>
                            <p class="font-poppins font-s-14 font-w-600"> Already have an account? <a href="login.php">Login</a>
                            <div class="form-group" style>
                                <input type="submit" name="register-submit"
                                    class="btn btn-banner font-poppins font-s-12 font-w-600 py-2 px-3 w-100" value="SUBMIT" />
                            </div>
                            </div><br>
                        </div>
                    </form>
                </div>
    <!--!Register form-->
</section>