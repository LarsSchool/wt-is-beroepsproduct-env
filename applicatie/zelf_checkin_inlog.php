<?php
require_once('db_connectie.php');
require_once('functions.php');

$conn= maakVerbinding();



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
       <input type="number" placeholder="Gewicht koffer (in kg's)" name="gewicht" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required>
        <br>
       <input type="submit" value="Inchecken bagage" name="inchecken_bagage">
      </form>
      <div class="foutmeldingen">
      <?php
      //INCHECKEN PASSAGIER, ALS DE PASSAGIER NOG NIET IN HET SYSTEEM GAAT, GEEFT HIJ GEWOON EEN ERROR.
        if(isset($_POST['inchecken_passagier'])){
          $passagiernummer = $_POST['passagiernummer_passagier'];
          $check = check_of_leeg('passagier', 'inchecktijdstip', "passagiernummer = $passagiernummer");

          if($check){
          $inchecktijdstip = new DateTime('now', new DateTimeZone('CET'));
          $inchecktijdstip = $inchecktijdstip->format('Y/m/d H:i:s.v');

          $sql = "update Passagier
          set inchecktijdstip = :inchecktijdstip
          where passagiernummer = :passagiernummer";
          $query = $conn->prepare($sql);
          $query->execute(['inchecktijdstip' => $inchecktijdstip, 'passagiernummer' => $passagiernummer]);
          $affected_rows = $query -> rowCount();
          if($affected_rows >= 1){
            //Als je de website helemaal offline wilt laten werken, moet dit weg. Dit is toch wel leuker :).
           header("Location: https://www.youtube.com/watch?v=r13riaRKGo0");
          } 
        } else
        {
          echo 'U bent al ingecheckt of u hebt een verkeerd passagiernummer ingevoerd.';
        }
      }

      //INCHECKEN BAGAGE 
      if(isset($_POST['inchecken_bagage'])){
        $passagiernummer = $_POST['passagiernummer_bagage'];
        $gewicht = $_POST['gewicht'];
        $objectvolgnummer = get_max('bagageobject', 'objectvolgnummer', "passagiernummer = $passagiernummer");
        if($objectvolgnummer == NULL){
          $objectvolgnummer = 0;
        } else {
          $objectvolgnummer = $objectvolgnummer + 1;
        }

        $sql = "insert into BagageObject (passagiernummer, objectvolgnummer, gewicht)
        values (:passagiernummer, :objectvolgnummer, :gewicht)";
        $query = $conn->prepare($sql);
        $query->execute(['passagiernummer' => $passagiernummer, 'objectvolgnummer' => $objectvolgnummer, 'gewicht' => $gewicht]);
        $affected_rows = $query->rowCount();
        if($affected_rows == 0){
          echo "Er mag niet meer dan 9 bagage meegenomen worden per passagier!";
        }
      }
      ?>
      </div>
    </main>
</body>
</html>