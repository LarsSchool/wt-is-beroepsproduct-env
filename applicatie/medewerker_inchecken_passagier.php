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
            <li><a href="schema_passagiers.php">Passagiers</a></li>
            <li><a href="medewerker_main_site.php">Vluchten</a></li>
            <li><a href="medewerker_inchecken_passagier.php">Inchecken passagier</a></li>
        </ul>
      </nav>
      <main>
      <form class="inlog" action="medewerker_inchecken_passagier.php">
      <input type="text" placeholder="Voornaam" pattern="[A-Za-z].{1,}" required>
      <br>
      <input type="text" placeholder="Achternaam" pattern="[A-Za-z].{1,}" required>
      <br>
      <input type="number" placeholder="Ticketnummer">
      <br>
      <input type="number" placeholder="Vluchtnummer" required>
      <br>
      <input type="number" placeholder="Aantal koffers">
      <br>
      <input type="number" placeholder="Totaalgewicht koffer(s)">
      <br>
      <input type="submit" value="Inchecken">
      </form>
    </main>
</body>
</html>