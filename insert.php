<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Contact</title>
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

        <?php

            $conn = mysqli_connect("localhost", "root", "", "adressenlijst");
            
            // Connectie
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $voornaam = mysqli_real_escape_string($conn, $_REQUEST['voornaam']);
            $achternaam = mysqli_real_escape_string($conn, $_REQUEST['achternaam']);
            $adres = mysqli_real_escape_string($conn, $_REQUEST['adres']);
            $huisnummer = mysqli_real_escape_string($conn, $_REQUEST['huisnummer']);
            $plaats = mysqli_real_escape_string($conn, $_REQUEST['plaats']);
            $postcode = mysqli_real_escape_string($conn, $_REQUEST['postcode']);
            $tekst = mysqli_real_escape_string($conn, $_REQUEST['tekst']);

            $sql = "INSERT INTO gegevens (voornaam, achternaam, adres, huisnummer , plaats, postcode, tekst)
            VALUES ('$voornaam', '$achternaam', '$adres', '$huisnummer', '$plaats', '$postcode', '$tekst')";
            $result = mysqli_query($conn, $sql);

            if(mysqli_query($conn, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            mysqli_close($conn);
     
        ?>
    </div>
    </main>
    <footer></footer>
</body>
</html>