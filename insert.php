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

            $conn = mysqli_connect("localhost", "root", "", "bestevaer");
            
            // Connectie
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $voornaam = mysqli_real_escape_string($conn, $_REQUEST['voornaam']);
            $achternaam = mysqli_real_escape_string($conn, $_REQUEST['achternaam']);
            $telefoonnummer = mysqli_real_escape_string($conn, $_REQUEST['telefoonnummer']);
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
            $bericht = mysqli_real_escape_string($conn, $_REQUEST['bericht']);

            $sql = "INSERT INTO contactgegevens (voornaam, achternaam, telefoonnummer, email , bericht)
            VALUES ('$voornaam', '$achternaam', '$telefoonnummer', '$email', '$bericht')";
            $result = mysqli_query($conn, $sql);

            if(mysqli_query($conn, $sql)){
                echo "Bedankt!<br>We hebben uw bericht ontvangen.";
            } else{
                echo "ERROR: Er is iets fouts gegaan.. $sql. " . mysqli_error($conn);
            }

            mysqli_close($conn);
     
        ?>
    </div>
    </main>
    <footer></footer>
</body>
</html>