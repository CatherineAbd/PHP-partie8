<?php 
  include "..\\top_p8.php";
  echo "Exercice 8";
  ?>
  <p class="topic">Afficher la date du jour - 22 jours<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>

  <?php setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"]); ?>
  <p>Date courante - 22 jours : <?= utf8_encode(strftime("%A %e %B %Y", strtotime("-22 days"))) ?></p>

  <!-- méthode objet -->
  <?php
    $date = new DateTime();
    $date->sub(new DateInterval("P22D"));
    echo "<br> méthode objet : " . $date->format("d-m-Y");
  ?>
    
<?php include "..\..\bottom_html.php"; ?>