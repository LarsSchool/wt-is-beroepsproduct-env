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
      <select>
        <option selected disabled>Sorteer op:</option>
        <option>Vluchtnummer Hoog-Laag</option>
        <option>Vluchtnummer Laag-Hoog</option>
        <option>Vliegtuigmaatschappij A-Z</option>
        <option>Vliegtuigmaatschappij Z-A</option>
        <option>Vertrekpunt A-Z</option>
        <option>Vertrekpunt Z-A</option>
        <option>Bestemming A-Z</option>
        <option>Bestemming Z-A</option>
        <option>Vertrek Hoog-Laag</option>
        <option>Vertrek Laag-Hoog</option>
        <option>Aankomst Hoog-Laag</option>
        <option>Aankomst Laag-Hoog</option>
      </select>
      <div class="tabel_container">
        <table>
            <tr>
              <th>Vluchtnummer</th>
              <th>Vliegtuigmaatschappij</th>
              <th>Vertrekpunt</th>
              <th>Bestemming</th>
              <th>Vertrek</th>
              <th>Aankomst</th>
              <th>Max Passagiers</th>
              <th>Max Bagage</th>
            </tr>
            <tr>
              <td>1</td>
              <td>KLM</td>
              <td>AMS</td>
              <td>MLS</td>
              <td>2022-11-11-15:40</td>
              <td>2022-11-11-20:05</td>
              <td>255</td>
              <td>80.000kg</td>
            </tr>
            <tr>
              <td>2</td>
              <td>KLM</td>
              <td>AMS</td>
              <td>MLS</td>
              <td>2022-11-11-15:40</td>
              <td>2022-11-11-20:05</td>
              <td>255</td>
              <td>80.000kg</td>
            </tr>
            <tr>
            <td>3</td>
            <td>KLM</td>
            <td>AMS</td>
            <td>MLS</td>
            <td>2022-11-11-15:40</td>
            <td>2022-11-11-20:05</td>
            <td>255</td>
            <td>80.000kg</td>
          </tr>
          <tr>
          <td>4</td>
          <td>KLM</td>
          <td>AMS</td>
          <td>MLS</td>
          <td>2022-11-11-15:40</td>
          <td>2022-11-11-20:05</td>
          <td>255</td>
          <td>80.000kg</td>
        </tr>
        <tr>
        <td>5</td>
        <td>KLM</td>
        <td>AMS</td>
        <td>MLS</td>
        <td>2022-11-11-15:40</td>
        <td>2022-11-11-20:05</td>
        <td>255</td>
        <td>80.000kg</td>
        </tr>
        <tr>
        <td>6</td>
        <td>KLM</td>
        <td>AMS</td>
        <td>MLS</td>
        <td>2022-11-11-15:40</td>
        <td>2022-11-11-20:05</td>
        <td>255</td>
        <td>80.000kg</td>
      </tr>
      </table>
    </div>
    <div class="medewerker_knoppen">
        <form action="vlucht_toevoegen.php">
    <button class="Vlucht_toevoegen_knop" >Vlucht toevoegen</button>
    </form>
    <form action="medewerker_main_site.php">
        <input type="number" placeholder="Vluchtnummer">
        <input type="submit" value="Zoeken"> 
    </form>
    </div>
</main>
</body>
</html>