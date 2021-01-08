<?php include("ships.php"); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/schepen.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Schepen</title>
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

    <div class="content">
    <form action="schepen.php" method="post">
      <select name="schip_select" id="">
        <option value="hermes">Hermes</option>
        <option value="lucky">Lucky Star</option>
        <option value="nsangela">NS Angela</option>
        <option value="sabrina">Sabrina</option>
        <option value="triumph">Triumph</option>
        <input type="submit" name="submit" value="Zoek">
    </form>

    <?php 

      if(isset($_POST["submit"]) ) {
          $gekozen_schip = $_POST["schip_select"];
          $ship = GetShip($gekozen_schip);

          $naam = $ship['naam'];
          $foto = $ship['photo'];
          $max_lading = $ship['GT'];
          $inhoud = $ship['M3'];
          echo "<h1>$naam</h1>";
          echo "De maximale lading is $max_lading<br>";
          echo "De inhoud is $inhoud<br><br>";
          echo "$foto";
          

      }
    ?>

    </div>





</div>
    
<footer></footer>
</body>
</html>