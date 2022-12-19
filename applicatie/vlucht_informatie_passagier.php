<?php

$conn = maakVerbinding();


$_post['vluchtnummer'];






?>


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
          <li><a href="zelf_checkin_inlog.php">Inchecken</a></li>
          <li><a href="vlucht_zoeken_passagier.php">Andere vlucht zoeken</a></li>
        </ul>
      </nav>
      <main>
    <div class="vluchttabel">
      <? 
      krijgVluchtInformatie_passagier();
      ?>
        <table>
            <tr>
              <th>Vluchtnummer</th>
              <th>Vliegtuigmaatschappij</th>
              <th>Vertrekpunt</th>
              <th>Bestemming</th>
              <th>Vertrek</th>
              <th>Aankomst</th>
              <th>Passagiers</th>
            </tr>
            <tr>
              <td>1</td>
              <td>KLM</td>
              <td>AMS</td>
              <td>MLS</td>
              <td>2022-11-11-15:40</td>
              <td>2022-11-11-20:05</td>
              <td>255</td>
            </tr>
      </table>
    </div>
</main>
</body>
</html>