<?php

require_once('db_connectie.php');
require_once('functions.php');
session_start();
check_log_in();
log_out();

$conn = maakVerbinding();

$passagiernummer = 0;

if (isset($_POST['passagiernummer'])) {
  $passagiernummer = $_POST['passagiernummer'];
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
    <?php titel_knop()?>
    <a href="privacy.php">Privacy policy</a>
  </header>
  <nav class="navigatie">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="schema_passagiers.php">Passagiers</a></li>
      <li><a href="medewerker_main_site.php">Vluchten</a></li>
      <li><a href="medewerker_inchecken_passagier.php">Inchecken passagier</a></li>
    </ul>
  </nav>
  <main>
    <div class="medewerker_knoppen">
      <form action="passagier_toevoegen.php">
        <button class="Vlucht_toevoegen_knop">Passagier toevoegen</button>
      </form>
      <form action="schema_passagiers.php" method="POST">
        <input type="text" placeholder="Passagiersnummer" name="passagiernummer">
        <input type="submit" value="Zoeken">
      </form>
    </div>
    <div class="tabel_container">
      <?php
      if (!isset($_GET['show_all_passagiers'])) {
        echo krijg_passagierinformatie(1, $passagiernummer, false);
      } else if (isset($_GET['show_all_passagiers'])) {
        echo krijg_passagierinformatie(1, $passagiernummer, true);
      }
      ?>
    </div>
    <?php
    if (!isset($_GET['show_all_passagiers']) && !isset($_POST['passagiernummer'])) {
      $show_all_knop = '        <form action="schema_passagiers.php">
    <button  class="show_all_knop" name="show_all_passagiers">Laat alle passagiers zien.</button>
  </form>';
      echo $show_all_knop;
    }
    ?>

  </main>
</body>

</html>