<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fletnix</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- hier schrijf jij je code --> 
    <header>
        <h1>Gelre Airport</h1>
        <a href="privacy.php">Privacy policy</a>
      </header>
      <nav class="navigatie">
        <ul>
          <li><a href="home.php">Home</a></li>
        </ul>
      </nav>
      <main>
      <form class="inlog" action="medewerker_main_site.php">
      <input class="gebruikersnaam" type="text" placeholder="Gebruikersnaam" pattern="[A-Za-z].{6,}" required>
      <br>
      <input class="wachtwoord" type="password" placeholder="Wachtwoord" pattern="[a-z0-9._%+-].{8,}" required>
      <br>
      <input class="inloggen" type="submit" value="Inloggen">
      </form>
    </main>
</body>
</html>