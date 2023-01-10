<?php
require_once('db_connectie.php');
require_once('functions.php');
session_start();
check_log_in();
log_out();

$conn = maakVerbinding();



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
    <?php titel_knop() ?>
    <a href="privacy.php">Privacy policy</a>
  </header>
  <nav class="navigatie">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="schema_passagiers.php">Terug</a></li>
    </ul>
  </nav>
  <main>
    <form class="toevoegen" action="passagier_toevoegen.php" method="POST">
      <input type="text" placeholder="Naam" pattern="[A-Za-z].{2,}" name="naam" required>
      <br>
      <input type="number" placeholder="Vluchtnummer" name="vluchtnummer" required>
      <br>
      <input type="char" placeholder="Geslacht" name="geslacht" required>
      <br>
      <input type="number" placeholder="Balienummer" name="balienummer" required>
      <br>
      <input type="text" placeholder="Stoel" name="stoel" required>
      <br>
      <!-- <input type="datetime-local" name="inchecktijdstip">
      <br> -->
      <input type="submit" value="Passagier toevoegen" name="submit">
    </form>
    <?php
    try {
      if (isset($_POST['submit'])) {
        $passagiernummer = get_max('passagier', 'passagiernummer') + 1;
        $naam = $_POST['naam'];
        $vluchtnummer = $_POST['vluchtnummer'];
        $geslacht = $_POST['geslacht'];
        $balienummer = $_POST['balienummer'];
        $stoel = $_POST['stoel'];

        // if ($_POST['inchecktijdstip'] >= date('Y/m/d H:i')) {
        //   $inchecktijdstip = $_POST['inchecktijdstip'];
        //   $inchecktijdstip = date('Y-m-d H:i:s.000', strtotime($inchecktijdstip));
        //   $sql = "insert into passagier
        //   values (:passagiernummer, :naam, :vluchtnummer, :geslacht, :balienummer, :stoel, :inchecktijdstip)";
        //   $query = $conn->prepare($sql);
        //   $query->execute(['passagiernummer' => $passagiernummer, 'naam' => $naam, 'vluchtnummer' => $vluchtnummer, 'geslacht' => $geslacht, 'balienummer' => $balienummer, 'stoel' => $stoel, 'inchecktijdstip' => $inchecktijdstip]);
        //   $affected_rows = $query->rowCount();
        //   if ($affected_rows >= 1) {
        //     //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
        //     header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
        //   } else {
        //     echo '<p class="foutmeldingen">Er is een fout opgetreden, controleer of de ingevulde gegevens kloppen.</p>';
        //   }
        // } else {
          $sql = "insert into passagier
          values (:passagiernummer, :naam, :vluchtnummer, :geslacht, :balienummer, :stoel, NULL)";
          $query = $conn->prepare($sql);
          $query->execute(['passagiernummer' => $passagiernummer, 'naam' => $naam, 'vluchtnummer' => $vluchtnummer, 'geslacht' => $geslacht, 'balienummer' => $balienummer, 'stoel' => $stoel]);
          $affected_rows = $query->rowCount();

          if ($affected_rows >= 1) {
            //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
            header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
          } else {
            echo '<p class="foutmeldingen">Er is een fout opgetreden, controleer of de ingevulde gegevens kloppen.</p>';
          }
       // }
      }
    } catch (PDOException $e) {
      echo '<p class="foutmeldingen">Er is een fout opgetreden. Dit komt waarschijnlijk doordat er een verkeerde stoel of vluchtnummer is ingevoerd.</p>';
    }
    ?>
  </main>
</body>

</html>