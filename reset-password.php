<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Voer het nieuwe wachtwoord in.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Wachtwoord moet ten minste 6 tekens bevatten.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bevestig het wachtwoord.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Wachtwoord komt niet overeen.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oeps! Er is iets fout gegaan. Probeer het later opnieuw.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wachtwoord Resetten</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>REDERIJ BESTEVAER</header>
    <main>

        <div class="wrapper">
            <nav class="flex-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="app.php">Bestevaer App</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="schepen.php">Schepen</a></li>
                </li>
            </ul>
            </nav>
        </div>

        <div class="content">
            <h2>Wachtwoord Resetten</h2>
            <p>Vul dit formulier in om uw wachtwoord opnieuw in te stellen.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>Nieuwe wachtwoord</label>
                    <br>
                    <input type="password" name="new_password" class="form-control" placeholder="Nieuwe wachtwoord" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Wachtwoord bevestigen</label>
                    <br>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Wachtwoord bevestigen">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link" href="app.php">Annuleren</a>
                </div>
            </form>
        </div>    
    </main>
    <footer></footer>
</body>
</html>