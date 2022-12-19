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
      <option>Voornaam A-Z</option>
      <option>Voornaam Z-A</option>
      <option>Achternaam A-Z</option>
      <option>Achternaam Z-A</option>
      <option>Telefoonnummer Hoog-Laag</option>
      <option>Telefoonnummer Laag-Hoog</option>
      <option>Stoelnummer Hoog-Laag</option>
      <option>Stoelnummer Laag-Hoog</option>
    </select>
    <div class="tabel_container">
        <table>
            <tr>
              <th>Vluchtnummer</th>
              <th>Voornaam</th>
              <th>Achternaam</th>
              <th>Telefoonnummer</th>
              <th>Email-adres</th>
              <th>Stoel</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Lars</td>
              <td>van Duijnhoven</td>
              <td>06-12312345</td>
              <td>Larsemail@gmail.com</td>
              <td>37A</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bastiaan</td>
                <td>Hopman</td>
                <td>06-12312345</td>
                <td>Bastiaansemail@gmail.com</td>
                <td>12D</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Lars</td>
                <td>van Duijnhoven</td>
                <td>06-12312345</td>
                <td>Larsemail@gmail.com</td>
                <td>37A</td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>Bastiaan</td>
                  <td>Hopman</td>
                  <td>06-12312345</td>
                  <td>Bastiaansemail@gmail.com</td>
                  <td>12D</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lars</td>
                    <td>van Duijnhoven</td>
                    <td>06-12312345</td>
                    <td>Larsemail@gmail.com</td>
                    <td>37A</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Bastiaan</td>
                      <td>Hopman</td>
                      <td>06-12312345</td>
                      <td>Bastiaansemail@gmail.com</td>
                      <td>12D</td>
                    </tr>
      </table>
    </div>
    <div class="medewerker_knoppen">
        <form action="passagier_toevoegen.php">
            <button class="Vlucht_toevoegen_knop" >Passagier toevoegen</button>
        </form>    
        <form action="schema_passagiers.php">
        <input type="text" placeholder="Naam passagier">
        <input type="submit" value="Zoeken"> 
    </form>
    </div>
</main>
</body>
</html>