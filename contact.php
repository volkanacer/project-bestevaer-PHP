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
        <h2>Contact</h2>
        <p>U kunt contact hebben met ons via.. </p>
        <p>Telefoon: 123456789<br>E-mail: schepen@bestevaer.nl </p>

      <div class="contactformulier">
          <form action="insert.php" method="post">
            <input type="text" name="voornaam" placeholder="Voornaam">
            <input type="text" name="achternaam" placeholder="Achternaam">

            <br> </br>

            <input type="text" name="telefoonnummer" placeholder="Telefoonnummer">
            <input type="text" name="email" placeholder="E-mail">

            <br> </br>

            <textarea name="bericht" rows="4" cols="50" placeholder="Typ hier uw bericht.."></textarea>

            <br> </br>
            <input type="submit" name="submit" value="Indienen">


          </form>
      </div>


    <footer></footer>
</body>
</html>