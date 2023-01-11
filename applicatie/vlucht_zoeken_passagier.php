<?php
require_once('db_connectie.php');
require_once('functions.php');
log_out();
$conn = maakVerbinding();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gelre airport</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
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
      <li><a href="zelf_checkin_inlog.php">Inchecken</a></li>
    </ul>
  </nav>
  <main>
    <form class="inlog" action="vlucht_informatie_passagier.php" method="POST">
      <input type="number" placeholder="Vluchtnummer" name="vluchtnummer" pattern="[0-9]" required>
      <br>
      <input type="submit" value="Vlucht zoeken">
    </form>
  </main>
</body>

</html>