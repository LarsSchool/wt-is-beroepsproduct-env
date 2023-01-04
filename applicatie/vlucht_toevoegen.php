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
      <li><a href="medewerker_main_site.php">Terug</a></li>
    </ul>
  </nav>
  <main>
    <form class="toevoegen" action="vlucht_toevoegen.php" method="POST">
      <input type="text" placeholder="Bestemming (afkorting)" name="bestemming" pattern="[A-Za-z]{3}" required>
      <br>
      <input type="text" placeholder="Gatecode" name="gatecode" pattern="[A-Za-z]{1}" required>
      <br>
      <input type="number" placeholder="Maximale aantal passagiers" name="max_aantal_passagiers" required>
      <br>
      <input type="number" placeholder="Maximale gewicht pp" name="max_gewicht_pp" required>
      <br>
      <input type="number" placeholder="Maximale totaalgewicht" name="max_totaalgewicht" required>
      <br>
      <input type="datetime-local" name="vertrektijd" required>
      <br>
      <input type="text" placeholder="Maatschappijcode" name="maatschappijcode" pattern="[A-Za-z]{2}" required>
      <br>
      <input type="submit" value="Vlucht toevoegen" name="submit">
    </form>
    <?php
    try {
      if (isset($_POST['submit'])) {
        // $vertrektijd = $_POST['vertrektijd'];
        $systeem_datum = new DateTime('now', new DateTimeZone('CET'));
        $systeem_datum = $systeem_datum->format('Y/m/d H:i:s.000');
        // $vertrektijd = strtotime($vertrektijd);
    
        //if ($_POST['vertrektijd'] > $systeem_datum) {
    
        $vertrektijd = strtotime($_POST['vertrektijd']);
        $vertrektijd = new DateTime("@$vertrektijd");
        $vertrektijd = $vertrektijd->format('Y/m/d H:i:s.000');

        if ($vertrektijd > $systeem_datum) {
          $vluchtnummer = get_max('vlucht', 'vluchtnummer') + 1;
          $bestemming = $_POST['bestemming'];
          $gatecode = $_POST['gatecode'];
          $max_aantal_passagiers = $_POST['max_aantal_passagiers'];
          $max_gewicht_pp = $_POST['max_gewicht_pp'];
          $max_totaalgewicht = $_POST['max_totaalgewicht'];
          $maatschappijcode = $_POST['maatschappijcode'];
          //$vertrektijd = $_POST['vertrektijd'];
          //$vertrektijd = date('Y-m-d H:i:s.000', strtotime($vertrektijd));
          //$vertrektijd = $vertrektijd->format('Y/m/d H:i:s.000');
    

          $sql = "insert into vlucht (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode)
                  values (:vluchtnummer, :bestemming, :gatecode, :max_aantal_passagiers, :max_gewicht_pp, :max_totaalgewicht,:vertrektijd, :maatschappijcode)";
          $query = $conn->prepare($sql);
          $query->execute(['vluchtnummer' => $vluchtnummer, 'bestemming' => $bestemming, 'gatecode' => $gatecode, 'max_aantal_passagiers' => $max_aantal_passagiers, 'max_gewicht_pp' => $max_gewicht_pp, 'max_totaalgewicht' => $max_totaalgewicht, 'vertrektijd' => $vertrektijd, 'maatschappijcode' => $maatschappijcode]);
          $affected_rows = $query->rowCount();
          if ($affected_rows >= 1) {
            //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
            header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
          }
        } else {
          echo '<p class="foutmeldingen">Er is een fout opgetreden. Controleer of de gegevens kloppen.</p>';
        }
      }
    } catch (PDOException $e) {
      echo '<p class="foutmeldingen">Er is een fout opgetreden. Dit komt waarschijnlijk doordat er een gegeven verkeerd is ingevuld.</p>';
    }
    ?>
  </main>
</body>

</html>