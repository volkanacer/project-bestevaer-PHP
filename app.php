<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Bestevaer App</title>
</head>
<body>
  <header>REDERIJ BESTEVAER</header>

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

      <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

      <div class="beladingsappform">
        <form action="appresultaten.php" method="post">

            <label for="naam"> Schip</label>
            </br >
            <select name="naam" id="">
              <option disabled selected value> -- Maak een keuze -- </option>
              <option value="Hermes">Hermes</option>
              <option value="Lucky Star">Lucky</option>
              <option value="NS Angela">NS Angela</option>
              <option value="Sabrina">Sabrina</option>
              <option value="Triumph IV">Triumph IV</option>
            </select>
            </br >
            <label for="GT"> Nieuwe ton lading toevoegen (Ton) </label>
            </br >
            <input type="text" name="GT" id="">
             </br >
            <label for="volume"> Nieuwe volume toevoegen (M3)</label>
            </br >
            <input type="text" name="Volume" id="">
            </br >
            </br >  
            <input type="submit" value="Berekenen">

        </form>
    </div>
            
    <footer></footer>
</body>
</html>