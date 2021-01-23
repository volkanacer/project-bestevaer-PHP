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
        <p>Tel: 123456789</p>
        <p>Email: schepen@bestevaer.nl</p>

        <div class="contactformulier">
          <form action="contact.php" method="post">
              <input type="text" name="naam" id="" placeholder="Voornaam">
              <input type="text" name="achternaam" id="" placeholder="Achternaam">
              </br >
              <input type="text" name="adres" id="" placeholder="Adres">
              <input type="text" name="postcode" id="" placeholder="Postcode">
              <input type="text" name="plaats" id="" placeholder="Plaats">
              </br >
              <input type="text" name="telefoonnummer" id="" placeholder="Telefoonnummer">
              <input type="email" name="email" id="" placeholder="E-mailadres">
              </br >
              </br >
              <textarea name="message" style="width:300px; height:100px;" placeholder="Typ hier uw bericht.."></textarea>
              </br >
              <input type="submit" value="Indienen">
          </form>
      </div>

    <footer></footer>
</body>
</html>