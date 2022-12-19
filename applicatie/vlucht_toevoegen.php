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
          <li><a href="medewerker_main_site.php">Terug</a></li>
        </ul>
      </nav>
      <main>
      <form class="toevoegen" action="vlucht_toevoegen.php">
      <input class="vluchtnummer" type="number" placeholder="Vluchtnummer" required>
      <br>
      <input class="vliegtuigmaatschappij" type="text" placeholder="Vliegtuigmaatschappij (afkorting)" pattern="[A-Za-z].{2,}" required>
      <br>
      <input class="vertrekpunt" type="text" placeholder="Vertrekpunt (afkorting)" pattern="[A-Za-z].{2,}" required>
      <br>
      <input class="bestemming" type="text" placeholder="Bestemming (afkorting)" pattern="[A-Za-z].{2,}" required>
      <br>
      <input class="vertrek" type="datetime-local" required>
      <br>
      <input class="aankomst" type="datetime-local" required>
      <br>
      <input class="passagiers" type="number" placeholder="Aantal passagiers" required>
      <br>
      <input class="inloggen" type="submit" value="Vlucht toevoegen">
      </form>
    </main>
</body>
</html>