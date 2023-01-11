<?php
require_once('db_connectie.php');
require_once('functions.php');
session_start();
check_log_in();
log_out();
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
    </ul>
  </nav>
  <main>
    <form class="inlog" action="medewerker_inlog.php" method="POST">
      <input class="gebruikersnaam" type="text" placeholder="Gebruikersnaam" pattern="[A-Za-z].{6,}" name="username"
        required>
      <br>
      <input class="wachtwoord" type="password" placeholder="Wachtwoord" pattern="[a-z0-9._%+-].{8,}" name="password"
        required>
      <br>
      <input class="inloggen" type="submit" value="Inloggen">
    </form>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
      if (login($_POST['username'], $_POST['password'])) {
        header('location: medewerker_main_site.php');
      } else {
        echo '<p class="foutmeldingen">Het wachtwoord of de gebruikersnaam is verkeerd ingevoerd.</p>';
      }
    }
    ?>
  </main>
</body>

</html>