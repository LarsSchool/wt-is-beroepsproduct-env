<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fletnix</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-image: url('images/vliegveld_2.jpg');
      /*Ik heb gekozen voor inline-css, omdat deze achtergrond alleen hier gebruikt wordt.*/
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
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
      <li><a href="zelf_checkin_inlog.php">Inchecken</a></li>
      <li><a href="vlucht_zoeken_passagier.php">Vlucht zoeken</a></li>
    </ul>
  </nav>
</body>

</html>