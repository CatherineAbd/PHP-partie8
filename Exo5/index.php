<?php 
  include "..\\top_p8.php";
  echo "Exercice 5";
  ?>
  <p class="topic">Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
    <p>Nbre de jours = <?= (int) ( (time()-strtotime("19 january 2021")) / 86400 ) ?></p>

    <!-- La ligne ci-dessus est équivalente à : -->
    <!-- <?php
      $timestampDay = time();
      $timestampSixteenMay = strtotime ("19 january 2021  ");
      echo "timestampDay : $timestampDay <br> timestampSixteenMay : $timestampSixteenMay";
      $nbDays = (int) (($timestampDay - $timestampSixteenMay) / 86400);
      echo "<br> nbDays : $nbDays";
    ?> -->
  </p>
    
<?php include "..\..\bottom_html.php"; ?>