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
          <li><a href="schema_passagiers.php">Terug</a></li>
        </ul>
      </nav>
      <main>
      <form class="toevoegen" action="passagier_toevoegen.php">
      <input class="vluchtnummer" type="number" placeholder="Vluchtnummer" required>
      <br>
      <input class="voornaam" type="text" placeholder="Voornaam" pattern="[A-Za-z].{2,}" required>
      <br>
      <input class="achternaam" type="text" placeholder="Achternaam" pattern="[A-Za-z].{2,}" required>
      <br>
      <input class="telefoonnummer" type="tel" placeholder="Telefoonnummer" required>
      <br>
      <input class="email" type="email" placeholder="Email-adres" required>
      <br>
      <input class="stoelnummer" type="number" placeholder="Stoelnummer" required>
      <br>
      <input class="inloggen" type="submit" value="Passagier toevoegen">
      </form>
    </main>
</body>
</html>