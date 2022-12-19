<?php
include_once ("db_connectie.php");

$conn = maakVerbinding();

//functie die richard heeft voor gedaan
function krijgMuziekscholen($isAdmin = 0, $where = '')
{

    $conn = maakVerbinding();

    $data = '<table
              <thead>
                <th>#</th>
                <th>Vluchtnummer</th>
                <th>Bestemming</th>
                <th>Gatecode</th>
                <th>Max_aantal_passagiers</th>
                <th>Vertrektijd</th>
                <th>Maatschappijcode</th>';
    if ($isAdmin == 1)
    {
        $data .= '<th>Edit</th>';
        $data .= '<th>Delete</th>';
    }
    $data .= '</thead>';

    if (strlen($where) == 0)
    {
        $subquery = '1=1';
    }
    else
    {
        $subquery = 'naam = ' . $where;
    }

    $sql = "SELECT * FROM muziekschool WHERE " . $subquery;

    $stmt = $conn->prepare($sql);
    $stmt->execute([$where]);

    $i = 0;
    foreach ($stmt as $rij)
    {
        $data .= '<tr>';
        $data .= '<td>' . $i . '</td>';
        $data .= '<td>' . $rij['schoolid'] . '</td>';
        $data .= '<td>' . $rij['naam'] . '</td>';
        $data .= '<td>' . $rij['plaatsnaam'] . '</td>';
        if ($isAdmin == 1)
        {
            $data .= '<th><a href="index.php?edit=' . $rij['schoolid'] . '">E</a></th>';
            $data .= '<th><a href="index.php?delete=' . $rij['schoolid'] . '">E</a></th>';

        }
        $data .= '</tr>';
        $i++;
    }
    $data .= '</table';
    return $data;

}

//functie die echt werkt hier
function krijgVluchtInformatie_passagier($isAdmin = 0, $where = '')
{

    $conn = maakVerbinding();

    $data = '<table
              <thead>
                <th>#</th>
                <th>SchoolID</th>
                <th>Naam</th>
                <th>Plaatsnaam</th>';
    if ($isAdmin == 1)
    {
        $data .= '<th>Edit</th>';
        $data .= '<th>Delete</th>';
    }
    $data .= '</thead>';

    if (strlen($where) == 0)
    {
        $subquery = '1=1';
    }
    else
    {
        $subquery = 'naam = ' . $where;
    }

    $sql = "SELECT * FROM muziekschool WHERE " . $subquery;

    $stmt = $conn->prepare($sql);
    $stmt->execute([$where]);

    $i = 0;
    foreach ($stmt as $rij)
    {
        $data .= '<tr>';
        $data .= '<td>' . $i . '</td>';
        $data .= '<td>' . $rij['schoolid'] . '</td>';
        $data .= '<td>' . $rij['naam'] . '</td>';
        $data .= '<td>' . $rij['plaatsnaam'] . '</td>';
        if ($isAdmin == 1)
        {
            $data .= '<th><a href="index.php?edit=' . $rij['schoolid'] . '">E</a></th>';
            $data .= '<th><a href="index.php?delete=' . $rij['schoolid'] . '">D</a></th>';

        }
        $data .= '</tr>';
        $i++;
    }
    $data .= '</table';
    return $data;

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
          <li><a href="home.php">Home</a></li>
          <li><a href="zelf_checkin_inlog.php">Inchecken</a></li>
        </ul>
      </nav>
      <main>
      <form class="inlog" action="vlucht_informatie_passagier.php" method="POST">
      <input type="number" placeholder="Vluchtnummer" name="vluchtnummer" required>
      <br>
      <input type="submit" value="Vlucht zoeken">
      </form>
    </main>
</body>
</html>
