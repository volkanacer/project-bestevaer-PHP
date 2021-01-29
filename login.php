<?php
// Sessie starten
session_start();
 
// Controleer of de gebruiker is ingelogd, zo ja, doorsturen naar app.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: app.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Kijk of de gebruikersnaam is ingevuld
    if(empty(trim($_POST["username"]))){
        $username_err = "Voer uw gebruikersnaam in.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Kijk of het wachtwoord is ingevuld
    if(empty(trim($_POST["password"]))){
        $password_err = "Voer uw wachtwoord in.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: app.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Het ingevulde wachtwoord was onjuist.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Geen account gevonden met die gebruikersnaam.";
                }
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
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
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
            <h2>Inloggen</h2>
            <p>Vul uw gegevens in om in te loggen.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Gebruikersnaam</label>
                    </br >
                    <input type="text" name="username" class="form-control" placeholder="Gebruikersnaam" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Wachtwoord</label>
                    </br >
                    <input type="password" name="password" class="form-control" placeholder="Wachtwoord">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                
                <p>Heeft u geen account?<a href="register.php">Meld u zich hier aan</a></p>
                
            </form>
        </div>
    </main>
    <footer></footer>
</body>
</html>