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
          <li><a href="schema_passagiers.php">Passagiers</a></li>
          <li><a href="medewerker_main_site.php">Vluchten</a></li>
          <li><a href="medewerker_inchecken_passagier.php">Inchecken passagier</a></li>
        </ul>
      </nav>
      <main>
      <div class="medewerker_knoppen">
        <form action="vlucht_toevoegen.php">
          <button class="Vlucht_toevoegen_knop" >Vlucht toevoegen</button>
        </form>
        <form action="medewerker_main_site.php" method="POST">
          <input type="number" placeholder="Vluchtnummer" name="vluchtnummer">
         <input type="submit" value="Zoeken"> 
        </form>
      </div>
      <div class="tabel_container">
      <?php
  if(!isset($_GET['show_all_vluchten'])){
    echo krijg_Vluchtinformatie(1, $vluchtnummer, false);
  } 
  else if(isset($_GET['show_all_vluchten'])){
    echo krijg_Vluchtinformatie(1, $vluchtnummer, true);
  }
?>   
       </div>
       <?php

  if(!isset($_GET['show_all_vluchten'])){
    $show_all_knop = '        <form action="medewerker_main_site.php">
    <button  class="show_all_knop" name="show_all_vluchten">Laat alle vluchten zien.</button>
    </form>';
    echo $show_all_knop;
  }
?>   

</main>
</body>
</html>