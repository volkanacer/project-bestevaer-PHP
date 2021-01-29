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

        // PHP admin informatie en database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bestevaer";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Connectie maken
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Connectie controleren
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $schip = $_POST["naam"];


        
        echo "U heeft gekozen voor $schip";
        

        $sql = "SELECT * FROM schepen WHERE naam='".$schip."'";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) > 0) {
        // Output van [bestevaer database] rijen,
          while($row = mysqli_fetch_array($results)) {
                $gewicht = $row["GT"];
                $volume = $row["Volume"];
                echo "<br>";
                echo "<br>Schip: " . $row["Naam"]. "<br>DWT: " . $row["DWT"]. "<br>GT: " . $row["GT"]. "<br>Volume: " . $row["Volume"]. "<br><br>";
              }
            }


        
        
        // GT en Volume uit Form & Database
            
        $nieuwe_lading = $_POST["GT"];    
        $nieuwe_volume = $_POST["Volume"];



            if(isset($_POST["GT"]) ) {
                  
                echo "Ingevoerde lading: $nieuwe_lading.<br>";
                echo "De maximale lading is: $gewicht.<br>";
                if($nieuwe_lading > $gewicht) {
                  echo "U heeft de maximale gewicht overschreden, de situatie is onveilig.<br>Kies een andere schip of neem contact met ons op.<br><br>";
                }
         
            }

            echo "<br>";

            if(isset($_POST["Volume"]) ) {
                echo "Ingevoerde volume: $nieuwe_volume.<br>";
                echo "De maximale volume is: $volume.<br>";
                if($nieuwe_volume > $volume) {
                  echo "U heeft de maximale volume overschreden, de situatie is onveilig.<br>Kies een andere schip of neem contact met ons op.<br>";
                }
            }


        }
        mysqli_close($conn);
    
    ?>


      </div>
<footer></footer>
</body>
</html>