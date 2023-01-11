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
      <li><a href="vlucht_zoeken_passagier.php">Vlucht zoeken</a></li>
    </ul>
  </nav>
  <main>

    <form class="inlog" action="zelf_checkin_inlog.php" method="POST">
      <input type="number" placeholder="Passagiernummer" name="passagiernummer_passagier" required>
      <br>
      <input type="submit" value="Inchecken passagier" name="inchecken_passagier">
    </form>

    <form class="inlog" action="zelf_checkin_inlog.php" method="POST">
      <input type="number" placeholder="Passagiernummer" name="passagiernummer_bagage" required>
      <br>
      <input type="number" placeholder="Gewicht koffer (in kg's)" name="gewicht" pattern="[0-9]+([\.,][0-9]+)?"
        step="0.01" required>
      <br>
      <input type="submit" value="Inchecken bagage" name="inchecken_bagage">
    </form>
    <?php
    //INCHECKEN PASSAGIER
    if (isset($_POST['inchecken_passagier'])) {
      $passagiernummer = $_POST['passagiernummer_passagier'];
      if (!is_numeric($passagiernummer)) {
        header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
        exit;
      }
      if (check_space_onboard(get_data('passagier', 'vluchtnummer', "passagiernummer = $passagiernummer")) > 0) {
        $check = check_of_leeg('passagier', 'inchecktijdstip', "passagiernummer = $passagiernummer");
        $check2 = check_of_leeg('passagier', 'vluchtnummer', "passagiernummer = $passagiernummer");

        if ($check && !$check2) {
          $inchecktijdstip = new DateTime('now', new DateTimeZone('CET'));
          $inchecktijdstip = $inchecktijdstip->format('Y/m/d H:i:s.v');

          $sql = "update Passagier
          set inchecktijdstip = :inchecktijdstip
          where passagiernummer = :passagiernummer";
          $query = $conn->prepare($sql);
          $query->execute(['inchecktijdstip' => $inchecktijdstip, 'passagiernummer' => $passagiernummer]);
          $affected_rows = $query->rowCount();
          var_dump($affected_rows);
          if ($affected_rows >= 1) {
            //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
            header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
          } else {
            echo '<p class="foutmeldingen">Er is iets fout gegaan, probeer het opnieuw.</p>';
          }
        } else {
          echo '<p class="foutmeldingen">Deze passagier is al ingecheckt of de passagier bestaat (nog) niet.</p>';
        }
      } else {
        echo '<p class="foutmeldingen">Deze vlucht is helaas al volgeboekt.</p>';
      }
    }

    //INCHECKEN BAGAGE 
    if (isset($_POST['inchecken_bagage'])) {
      try {
        $passagiernummer = $_POST['passagiernummer_bagage'];
        $gewicht = $_POST['gewicht'];

        if (!is_numeric($passagiernummer) && !is_numeric($gewicht)) {
          header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
          exit;
        }

        $check = check_weight(get_data('passagier', 'vluchtnummer', "passagiernummer = $passagiernummer"));

        if ($check >= $gewicht) {
          $objectvolgnummer = get_max('bagageobject', 'objectvolgnummer', "passagiernummer = $passagiernummer");
          if ($objectvolgnummer == NULL) {
            $objectvolgnummer = 0;
          } else {
            $objectvolgnummer = $objectvolgnummer + 1;
          }

          $sql = "insert into BagageObject (passagiernummer, objectvolgnummer, gewicht)
          values (:passagiernummer, :objectvolgnummer, :gewicht)";
          $query = $conn->prepare($sql);
          $query->execute(['passagiernummer' => $passagiernummer, 'objectvolgnummer' => $objectvolgnummer, 'gewicht' => $gewicht]);
          $affected_rows = $query->rowCount();
          if ($affected_rows == 0) {
            $_SESSION['error_message'] = 'Er mag niet meer dan 9 bagage meegenomen worden per passagier!';
          }
          if ($affected_rows >= 1) {
            //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
            header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
            exit;
          } else {
            echo '<p class="foutmeldingen">Er is iets fout gegaan, probeer het opnieuw.</p>';
          }
        } else if ($check > !$gewicht) {
          echo '<p class="foutmeldingen">Het maximale gewicht wordt overschreden met deze bagage. Er kan maximaal nog ' . $check . 'kg toegevoegd worden.</p>';
        }
      } catch (PDOException $e) {
        echo '<p class="foutmeldingen">Dit passagiernummer bestaat niet.</p>';
      }
    }

    if (isset($_SESSION['error_message'])) {
      echo '<p class="foutmeldingen">' . $_SESSION['error_message'] . '</p>';
      unset($_SESSION['error_message']);
    }
    ?>
  </main>
</body>

</html>