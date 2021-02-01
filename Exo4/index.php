<?php 
  include "..\\top_p8.php";
  echo "Exercice 4";
  ?>
  <p class="topic">Afficher le timestamp du jour.  <br>
Afficher le timestamp du mardi 2 août 2016 à 15h00.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
  <p>Timestamp courant = <?= time()?></p>
  <p>Timestamp du 2/8/16 15h00 = <?= mktime(15, 0, 0, 8, 2, 2016) ?></p>

  <!-- méthode objet -->
  <?php
    $timestamp = new DateTime();
    echo $timestamp->getTimestamp();

    $timestampTwoAugust = new DateTime("2016-08-02 15:00");
    echo "<br>" . $timestampTwoAugust->getTimestamp();
  ?>
    
<?php include "..\..\bottom_html.php"; ?>