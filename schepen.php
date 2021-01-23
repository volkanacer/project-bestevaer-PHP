
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
        <select name="naam" id="">
          <option disabled selected value> -- Maak een keuze -- </option>
          <option value="Hermes">Hermes</option>
          <option value="Lucky Star">Lucky Star</option>
          <option value="NS Angela">NS Angela</option>
          <option value="Sabrina">Sabrina</option>
          <option value="Triumph IV">Triumph IV</option>
          <input type="submit" name="submit" value="Zoek">
      </form>

      <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bestevaer";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $schip=$_POST["naam"];
        echo "U heeft gekozen voor $schip";

        $sql = "SELECT * FROM schepen WHERE naam='".$schip."'";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) > 0) {
        // output data of each row
          while($row = mysqli_fetch_array($results)) {
                echo "<br>";
                echo "IMO number: " . $row["IMOno"]. "<br>Schip: " . $row["Naam"]. "<br>DWT: " . $row["DWT"]. "<br>GT: " . $row["GT"]. "<br>Volume: " . $row["Volume"]. "<br>";
              }
            }

            mysqli_close($conn);
        }
      ?>


    </div>

</div>
    
<footer></footer>
</body>
</html>