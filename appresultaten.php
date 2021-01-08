<?php include("ships.php"); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/appresultaten.css">
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

    if(isset($_POST["submit"]))
    {
        $name = $_GET["ship"];
        $ships = GetShip($_GET["ship"]);
        echo "<h1>$name</h1>";
        echo "<p>GWT = {$ships['GT']}</p>";
        echo "<p>Inhoud = {$ships['M3']}</p>";
    }
    if(isset($_POST["lading"]) ) {
        $gekozen_schip = $_POST["schip_select"];
        $ships = GetShip($gekozen_schip);


        $max_lading = $ships['GT'];
        $nieuwe_lading = $_POST['lading'];
        echo "U heeft $gekozen_schip geselecteerd.<br>";
        echo "De maximale lading is $max_lading.";
        echo "<br>";
        echo "De ingevoerde lading is: $nieuwe_lading.";
        echo "<br>";

        $veilig = false;
        
        echo "<br>";
        
        if($max_lading >= $nieuwe_lading){
            echo "De situatie is veilig gesteld, neem contact met ons op.";
        }
        else if($max_lading <= $nieuwe_lading) {
            echo "De situatie is onveilig gesteld. Kies een andere schip of neem contact met ons op.";
        }

    }
    ?>

    <br> </br>  <br> </br>  <br> </br> 

<?php 
    
    if(isset($_POST["submit"]))
    {
        $name = $_GET["ship"];
        $ship = GetShip($_GET["ship"]);
        echo "<h1>$name</h1>";
        echo "<p>GWT =  {$ships['GT']}</p>";
        echo "<p>Inhoud = {$ships['M3']}</p>";
    }
    if(isset($_POST["volume"]) ) {
        $gekozen_schip = $_POST["schip_select"];
        $ship = GetShip($gekozen_schip);


        $maximale_volume = $ships['M3'];
        $nieuwe_volume =  $_POST['volume'];
        echo "De maximale volume is $maximale_volume";
        echo "<br>";
        echo "De ingevoerde volume is: $nieuwe_volume";
        echo "<br>";

        $veilig = false;
        
        echo "<br>";
        
        if($maximale_volume >= $nieuwe_volume){
            echo "De situatie is veilig gesteld, neem contact met ons op.";
        }

        else if($maximale_volume <= $nieuwe_volume) {
            echo "De situatie is onveilig gesteld. Kies een andere schip of neem contact met ons op.";
        }

    }
    ?>

<form action="" method="post">

<label for="TONCONV">TON naar M3</label>
<input type="text" name="TONCONV" id="TONCONV">
<input type="submit" name="submit2" value="Berekenen">
</form>

<?php

if(isset($_POST["submit2"])  ) {

$Ton_M3 = $_POST['TONCONV'];
echo 0.42 / $Ton_M3;

}
?>



      </div>
<footer></footer>
</body>
</html>