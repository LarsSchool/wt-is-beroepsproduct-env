<?php
require_once('db_connectie.php');
require_once('functions.php');
session_start();
log_out();
?>


<!DOCTYPE html>
<html lang="en">
<div class="index">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelre airport</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <?= kiesAchtergrond()?>
</head>

<body>
  <!-- hier schrijf jij je code -->
  <header>
    <?= titel_knop() ?>
    <a href="privacy.php">Privacy policy</a>
  </header>
  <nav class="navigatie">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="passagier_main_site.php">Passagier</a></li>
      <li><a href="medewerker_inlog.php">Medewerker</a></li>
    </ul>
  </nav>
</body>
</div>

</html>