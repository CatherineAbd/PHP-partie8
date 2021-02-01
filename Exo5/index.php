<?php 
  include "..\\top_p8.php";
  echo "Exercice 5";
  ?>
  <p class="topic">Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
    <p>Nbre de jours = <?= (int) ( (time()-strtotime("16 may 2016")) / 86400 ) ?></p>

    <!-- La ligne ci-dessus est équivalente à : -->
    <!-- <?php
      $timestampDay = time();
      $timestampSixteenMay = strtotime ("16 may 2016");
      echo "timestampDay : $timestampDay <br> timestampSixteenMay : $timestampSixteenMay";
      $nbDays = (int) (($timestampDay - $timestampSixteenMay) / 86400);
      echo "<br> nbDays : $nbDays";
    ?> -->

  <!-- Méthode objet -->
  <?php
    // On utilise date pour être sûrs des formats
    $dateDay = new DateTime(date("d-m-Y"));
    $dateSixteenMay = new DateTime(date("16-05-2016"));
    $interval = $dateSixteenMay->diff($dateDay);

    // %R donne le signe de l'intervalle (selon qu'on fait $date1 - $date2 ou $date2 - $date1
    echo "<br>" . $interval->format("%R%a jours");
    // ou
    echo "<br>" . $interval->days;
    var_dump($interval);

 include "..\..\bottom_html.php"; ?>