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

      <div class="beladingsappform">

        <form action="appresultaten.php" method="post">

            <label for="schip_select"> Schip</label>

            </br >

            <select id="schip_select" name="schip_select">
              <option value="hermes">Hermes</option>
              <option value="lucky">Lucky</option>
              <option value="nsangela">NS Angela</option>
              <option value="sabrina">Sabrina</option>
              <option value="triumph">Triumph</option>
            </select>

            </br >

            <label for="lading"> Hoeveelheid lading (ton en m3)</label>

            </br >

            <input type="text" name="lading" id="">

            </br >

            <label for="watersoort"> Watersoort</label>

            </br >

            <select id="watersoort" name="watersoort">
              <option value="zoet">Zoetwater</option>
              <option value="zout">Zoutwater</option>
            </select>

            </br >

            <label for="seizoen"> Seizoen</label>

            </br >

            <select id="seizoen" name="seizoen">
              <option value="lente">Lente</option>
              <option value="zomer ">Zomer</option>
              <option value="herfst">Herfst</option>
              <option value="winter">Winter</option>
            </select>

            </br >  

            <input type="submit" value="Berekenen">

        </form>

    </div>
            
    <footer></footer>
</body>
</html>