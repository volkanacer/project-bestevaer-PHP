<?php include("ships.php"); ?>
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

      <div class="content">

    <?php

  if(isset($_POST["lading"]) ) {
    $gekozen_schip = $_POST["schip_select"];
    $ship = GetShip($gekozen_schip);


  $max_lading = $ship['GT'];
  $nieuwe_lading = $_POST['lading'];
  echo "Berekend vanuit het html.<br>";
  echo "De maximale lading is $max_lading.";
  echo "<br>";
  echo "De ingevoerde lading is: $nieuwe_lading.";

  $veilig = false;
  // Maak een if statement om te bepalen of de ingevoerde lading veilig is
  echo "<br>";
  // echo "Het is: niet veilig/veilig";
  if($max_lading >= $nieuwe_lading){
      echo "De situatie is veilig, neem contact met ons op.";
  }
  else{
      echo "De situatie is onveilig, selecteer een andere schip of neem contact met ons op.";
  }

}


    ?>
      </div>
<footer></footer>
</body>
</html>