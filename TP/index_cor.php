<?php

  $monthArray = [1 => "janvier", 2 => "février", 3 => "mars", 4 => "avril", 5 => "mai", 6 => "juin", 7 => "juillet", 8 => "août", 9 => "septembre", 10 => "octobre", 11 => "novembre", 12 => "décembre"];

  $yearMin = 2000;
  $yearMax = 2038;

  $daysArray = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];

  if (isset($_POST["btnSubmit"])) {
    $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST["month"], $_POST["year"]);
    $firstDayInMonth = date("w", mktime(12, 0, 0, $_POST["month"], 1, $_POST["year"]));
    $month = $monthArray[$_POST["month"]];
    $year = $_POST["year"];
  } else {
    // récupération du nbre du jour et du premier jour du mois en cours pour valeurs par défaut
    $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, date("n"), date("y"));
    $firstDayInMonth = date("w", mktime(12, 0, 0, date("n"), 1, date("y")));
    setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"], ["fra.UTF8"]);
    $month = utf8_encode(strftime("%B"));
    $year = date("Y");
  }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Calendrier corrigé</title>
</head>

<body>

  <div class="container-fluid text-center">
    <h1>Mon calendrier</h1>
    <div class="container">
      <form action="" method="post">
        <div class="m-1">
          <select name="month" id="month">
            <option disabled>Choisir un mois</option>
            <?php
            foreach ($monthArray as $key => $value) { ?>
              <!-- selected permet de garder la valeur saisie la 1ère fois au rechargement de la page -->
              <option value='<?= $key ?>' <?= isset($_POST["month"]) && $_POST["month"] == $key ? "selected" : "" ?>><?= $value ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="m-1">
          <select name="year" id="year">
            <option disabled>Choisir une année</option>
            <?php
            for ($i = $yearMin; $i <= $yearMax; $i++) { ?>
              <!-- Si value n'est pas précisée, elle est égale au texte -->
              <option <?= isset($_POST["year"]) && $_POST["year"] == $i ? "selected" : "" ?>><?= $i ?></option>
              <!-- <option><?= $i ?></option> -->
              <?php } ?>
            </select>
          </div>
          <button class="btn btn-secondary btn-lg" type="submit" name="btnSubmit">Créer le calendrier</button>
        </form>
      </div>
    </div>
    <h2><?= $month ?> <?= $year ?> </h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <?php
          foreach ($daysArray as $day) { ?>
            <th> <?= $day ?> </th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $case = 1;
        $day = 1;
        while ($day <= $totalDaysInMonth) { ?>
          <tr>
            <?php
            for ($i = 1; $i <= 7; $i++) { 
              if ($case >= $firstDayInMonth && $day <= $totalDaysInMonth) { ?>
                <td><?= $day ?></td>
              <?php
                $day++;
              } else { ?>
                <td class="bg-secondary"></td>
              <?php } ?>
            <?php
              $case++;
            } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</body>

</html>