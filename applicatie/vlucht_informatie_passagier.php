<?php

require_once('db_connectie.php');
require_once('functions.php');


$conn = maakVerbinding();
$vluchtnummer = 0;

if(isset($_POST['vluchtnummer'])){
  $vluchtnummer = $_POST['vluchtnummer'];
}



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
          <li><a href="index.php">Home</a></li>
          <li><a href="zelf_checkin_inlog.php">Inchecken</a></li>
          <li><a href="vlucht_zoeken_passagier.php">Andere vlucht zoeken</a></li>
        </ul>
      </nav>
      <main>
    <div class="vluchttabel">
      <?= krijg_Vluchtinformatie(0, $vluchtnummer)   ?>
    </div>
</main>
</body>
</html>