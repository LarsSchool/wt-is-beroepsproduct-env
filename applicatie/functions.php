<?php



//-------------------------------------------------------------------------------------------------------------------------------------------
//functie die richard heeft voor gedaan
function krijgMuziekscholen($isAdmin = 0, $where = '')
{

  $conn = maakVerbinding();

  $data = '<table
              <thead>
                <th>#</th>
                <th>SchoolID</th>
                <th>Naam</th>
                <th>Plaatsnaam</th>';
  if ($isAdmin == 1) {
    $data .= '<th>Edit</th>';
    $data .= '<th>Delete</th>';
  }
  $data .= '</thead>';

  if (strlen($where) == 0) {
    $subquery = '1=1';
  } else {
    $subquery = 'naam = ' . $where;
  }

  $sql = "SELECT * FROM muziekschool WHERE " . $subquery;

  $stmt = $conn->prepare($sql);
  $stmt->execute([$where]);

  $i = 0;
  foreach ($stmt as $rij) {
    $data .= '<tr>';
    $data .= '<td>' . $i . '</td>';
    $data .= '<td>' . $rij['schoolid'] . '</td>';
    $data .= '<td>' . $rij['naam'] . '</td>';
    $data .= '<td>' . $rij['plaatsnaam'] . '</td>';
    if ($isAdmin == 1) {
      $data .= '<th><a href="index.php?edit=' . $rij['schoolid'] . '">E</a></th>';
      $data .= '<th><a href="index.php?delete=' . $rij['schoolid'] . '">E</a></th>';

    }
    $data .= '</tr>';
    $i++;
  }
  $data .= '</table';
  return $data;

}


//-------------------------------------------------------------------------------------------------------------------------------------------



function krijg_Vluchtinformatie($isAdmin = 0, $where = '', $bool_show_all_vluchten = false, $bool_sort_by = false)
{

  $vertrektijdVolgorde = "desc";
  $bestemmingVolgorde = "desc";

  if ($where == 0) {

    if (isset($_GET['bestemming'])) {
      switch ($_GET['bestemming']) {

        case 'desc':
          $orderby = "order by bestemming desc";
          $bestemmingVolgorde = "asc";
          break;
        case 'asc':
          $orderby = "order by bestemming asc";
          $bestemmingVolgorde = "desc";
          break;
      }

      $bool_sort_by = true;
    } else if (isset($_GET['vertrektijd'])) {
      switch ($_GET['vertrektijd']) {

        case 'desc':
          $orderby = "order by vertrektijd desc";
          $vertrektijdVolgorde = "asc";
          break;
        case 'asc':
          $orderby = "order by vertrektijd asc";
          $vertrektijdVolgorde = "desc";
          break;
      }


      $bool_sort_by = true;
    }


    if ($bool_show_all_vluchten) {
      if ($bool_sort_by) {
        $sql = "SELECT * FROM vlucht " . $orderby;
      } else {
        $sql = "SELECT * FROM vlucht ";
      }
    } else {
      if ($bool_sort_by) {
        $sql = "SELECT TOP 50 * FROM vlucht " . $orderby;
      } else {
        $sql = "SELECT TOP 50 * FROM vlucht ";
      }
    }
  } else if (is_numeric($where)) {
    $subquery = 'vluchtnummer = ' . $where;
    $sql = "SELECT * FROM vlucht WHERE " . $subquery;
  } else if (strlen($where) != 0) {
    echo $where;
    var_dump($where);
    header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    die();
  } else {
    echo '<p class="foutmeldingen">Vul alstublieft iets in voordat u gaat zoeken.</p>';
    die();
  }

  $conn = maakVerbinding();
  if ($isAdmin == 1) {
    $data = '<table
                <thead>
                  <th>Vluchtnummer</a></th>
                  <th><a href="medewerker_main_site.php?bestemming=' . $bestemmingVolgorde . '">Bestemming</th>
                  <th>Gatecode</th>
                  <th>Max aantal passagiers</th>
                  <th>Max gewicht pp</th>
                  <th>Max totaalgewicht</th>
                  <th><a href="medewerker_main_site.php?vertrektijd=' . $vertrektijdVolgorde . '">Vertrektijd</a></th>
                  <th>Maatschappijcode</th>';
    $data .= '</thead>';
  } else if ($isAdmin == 0) {
    $data = '<table
            <thead>
              <th>Vluchtnummer</th>
              <th>Bestemming</th>
              <th>Gatecode</th>
              <th>Vertrektijd</th>
              <th>Maatschappijcode</th>';
    $data .= '</thead>';
  }


  $stmt = $conn->prepare($sql);
  $stmt->execute([$where]);
  $affected_rows = $stmt->rowCount();


  if ($isAdmin == 1) {
    if ($affected_rows == 0) {
      echo '<p class="foutmeldingen">Dit vluchtnummer staat helaas niet in onze database, onze excuses hiervoor.</p>';
    } else {
      foreach ($stmt as $rij) {
        $data .= '<tr>';
        $data .= '<td>' . $rij['vluchtnummer'] . '</td>';
        $data .= '<td>' . $rij['bestemming'] . '</td>';
        $data .= '<td>' . $rij['gatecode'] . '</td>';
        $data .= '<td>' . $rij['max_aantal'] . '</td>';
        $data .= '<td>' . $rij['max_gewicht_pp'] . '</td>';
        $data .= '<td>' . $rij['max_totaalgewicht'] . '</td>';
        $data .= '<td>' . $rij['vertrektijd'] . '</td>';
        $data .= '<td>' . $rij['maatschappijcode'] . '</td>';
        $data .= '</tr>';
      }
      $data .= '</table';
      return $data;
    }
  } else if ($isAdmin == 0) {
    if ($affected_rows == 0) {
      echo '<p class="foutmeldingen">Dit vluchtnummer staat helaas niet in onze database, onze excuses hiervoor.</p>';
    } else {
      foreach ($stmt as $rij) {
        $data .= '<tr>';
        $data .= '<td>' . $rij['vluchtnummer'] . '</td>';
        $data .= '<td>' . $rij['bestemming'] . '</td>';
        $data .= '<td>' . $rij['gatecode'] . '</td>';
        $data .= '<td>' . $rij['vertrektijd'] . '</td>';
        $data .= '<td>' . $rij['maatschappijcode'] . '</td>';
        $data .= '</tr>';
      }
      $data .= '</table';
      return $data;
    }
  }

}


//-------------------------------------------------------------------------------------------------------------------------------------------


function krijg_Passagierinformatie($isAdmin = 0, $where = '', $bool_show_all_passagiers = false, $bool_sort_by = false)
{

  $stoelVolgorde = "desc";
  $tijdstipVolgorde = "desc";
  $pasnumVolgorde = "desc";


  if ($where == 0) {
    if (isset($_GET['stoel'])) {
      switch ($_GET['stoel']) {

        case 'desc':
          $orderby = "order by stoel desc";
          $stoelVolgorde = "asc";
          break;
        case 'asc':
          $orderby = "order by stoel asc";
          $stoelVolgorde = "desc";
          break;
      }
      $bool_sort_by = true;
    } else if (isset($_GET['inchecktijdstip'])) {
      switch ($_GET['inchecktijdstip']) {

        case 'desc':
          $orderby = "order by inchecktijdstip desc";
          $tijdstipVolgorde = "asc";
          break;
        case 'asc':
          $orderby = "order by inchecktijdstip asc";
          $tijdstipVolgorde = "desc";
          break;
      }
      $bool_sort_by = true;
    } else if (isset($_GET['passagiernummer'])) {
      switch ($_GET['passagiernummer']) {

        case 'desc':
          $orderby = "order by passagiernummer desc";
          $pasnumVolgorde = "asc";
          break;
        case 'asc':
          $orderby = "order by passagiernummer asc";
          $pasnumVolgorde = "desc";
          break;
      }
      $bool_sort_by = true;
    }
    // ALS IK ALLE VLUCHTEN HEB LATEN ZIEN, MAAR DAN WIL SORTEREN, REFRESHED HIJ ALSOF IK NIET ALLES HEB LATEN ZIEN, HOE FIX JE DIT????
    if ($bool_show_all_passagiers) {
      if ($bool_sort_by) {
        $sql = "SELECT * FROM passagier " . $orderby;
      } else {
        $sql = "SELECT * FROM passagier ";
      }
    }
    //dit gedeelte nog bij de vluchten implementeren
    else {
      if ($bool_sort_by) {
        $sql = "SELECT TOP 50 * FROM passagier " . $orderby;
      } else {
        $sql = "SELECT TOP 50 * FROM passagier ";
      }
    }
  } else if (is_numeric($where)) {
    $subquery = 'passagiernummer = ' . $where;
    $sql = "SELECT * FROM passagier WHERE " . $subquery;
  } else if (strlen($where) != 0) {
    echo $where;
    var_dump($where);
    header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    die();
  } else {
    echo '<p class="foutmeldingen">Vul alstublieft iets in voordat u gaat zoeken.</p>';
    die();
  }




  $conn = maakVerbinding();

  $data = '<table
                <thead>
                  <th><a href="schema_passagiers.php?passagiernummer=' . $pasnumVolgorde . '">Passagiernummer</a></th>
                  <th>Naam</th>
                  <th>Vluchtnummer</th>
                  <th>Geslacht</th>
                  <th>Balienummer</th>
                  <th><a href="schema_passagiers.php?stoel=' . $stoelVolgorde . '">Stoel</a></th>
                  <th><a href="schema_passagiers.php?inchecktijdstip=' . $tijdstipVolgorde . '">Inchecktijdstip</a></th>';
  $data .= '</thead>';




  $stmt = $conn->prepare($sql);
  $stmt->execute([$where]);
  $affected_rows = $stmt->rowCount();


  if ($affected_rows == 0) {
    echo '<p class="foutmeldingen">Dit passagiernummer staat helaas niet in onze database, onze excuses hiervoor.</p>';
  } else {
    foreach ($stmt as $rij) {
      $data .= '<tr>';
      $data .= '<td>' . $rij['passagiernummer'] . '</td>';
      $data .= '<td>' . $rij['naam'] . '</td>';
      $data .= '<td>' . $rij['vluchtnummer'] . '</td>';
      $data .= '<td>' . $rij['geslacht'] . '</td>';
      $data .= '<td>' . $rij['balienummer'] . '</td>';
      $data .= '<td>' . $rij['stoel'] . '</td>';
      $data .= '<td>' . $rij['inchecktijdstip'] . '</td>';
      $data .= '</tr>';
    }
    $data .= '</table';
    return $data;
  }
}
;


//-------------------------------------------------------------------------------------------------------------------------------------------


function get_max($tabel, $kolom, $where = '1=1')
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $sql = "SELECT MAX($kolom) FROM $tabel WHERE $where ";

  $query = $conn->prepare($sql);
  $query->execute();
  $resultaat = '';

  foreach ($query as $rij) {
    $resultaat = $rij[0];
  }
  return $resultaat;
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function check_of_leeg($tabel, $kolom, $where)
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $sql = "SELECT $kolom FROM $tabel WHERE $where";

  $query = $conn->prepare($sql);
  $query->execute();

  $resultaat = '';

  foreach ($query as $rij) {
    $resultaat = $rij[0];
  }

  if ($resultaat == NULL) {
    return true;
  } else if ($resultaat != NULL) {
    return false;
  }
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function get_data($tabel, $kolom, $where = '1=1')
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $sql = "SELECT $kolom FROM $tabel WHERE $where";

  $query = $conn->prepare($sql);
  $query->execute();
  $resultaat = '';

  foreach ($query as $rij) {
    $resultaat = $rij[0];
  }
  return $resultaat;
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function check_weight($where = '-1 or 1=1')
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $sql = "SELECT max_totaalgewicht - SUM(gewicht) AS rest
  FROM BagageObject
  RIGHT JOIN Passagier
  ON BagageObject.passagiernummer=Passagier.passagiernummer
  RIGHT JOIN Vlucht
  ON Passagier.vluchtnummer=Vlucht.vluchtnummer
  GROUP BY Passagier.vluchtnummer, max_totaalgewicht
  HAVING Passagier.vluchtnummer = :waar";

  $query = $conn->prepare($sql);
  $query->execute(['waar' => $where]);
  $resultaat = '';

  foreach ($query as $rij) {
    $resultaat = $rij[0];
  }
  if ($resultaat == NULL) {
    return get_data('vlucht', 'max_totaalgewicht', "vluchtnummer = $where");
  } else {
    return $resultaat;
  }
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function check_space_onboard($where = '-1 or 1=1')
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $sql = "SELECT max_aantal - COUNT(Passagier.inchecktijdstip)
  FROM Passagier
  JOIN Vlucht
  ON Passagier.vluchtnummer = vlucht.vluchtnummer
  GROUP BY Passagier.vluchtnummer, max_aantal
  HAVING Passagier.vluchtnummer = :waar";

  $query = $conn->prepare($sql);
  $query->execute(['waar' => $where]);
  $resultaat;

  foreach ($query as $rij) {
    $resultaat = $rij[0];
  }
  return $resultaat;
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function check_log_in()
{
  if ($_SERVER['PHP_SELF'] == '/medewerker_inlog.php') {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      header('location: medewerker_main_site.php');
    }
  } else if ($_SERVER['PHP_SELF'] != '/medewerker_inlog.php') {
    if (!$_SESSION['logged_in']) {
      header('location: index.php');
    }
  }
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function login($username, $password)
{
  require_once('db_connectie.php');
  $conn = maakVerbinding();

  $salt = 'JIDWHUDWHUWDHUWDHUWDIJOJVHIVEUHIUIEEJIEJFE';
  $password .= $salt;

  $sql = "SELECT password FROM medewerkers WHERE naam =  '$username'";
  $query = $conn->prepare($sql);
  $query->execute();

  $hash = '';
  foreach ($query as $rij) {
    $hash = $rij[0];
  }
  $_SESSION['logged_in'] = false;
  if (password_verify($password, $hash)) {
    $_SESSION['logged_in'] = true;
    session_start();
  }

  return password_verify($password, $hash);
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function log_out()
{
  if (isset($_POST['log_out'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
    exit;
  }
}


//-------------------------------------------------------------------------------------------------------------------------------------------


function titel_knop()
{
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo '<form method="POST">
  <button type="submit" name="log_out">Gelre Airport</button>
  </form>';
  } else {
    echo '<h1>Gelre Airport</h1>';
  }

}





?>