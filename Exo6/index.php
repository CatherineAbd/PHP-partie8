<?php 
  include "..\\top_p8.php";
  echo "Exercice 6";
  ?>
  <p class="topic">Afficher le nombre de jour dans le mois de février de l'année 2016.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
    <?= "Nb Jours en février 2016 : " . getdate(strtotime("-1 day 1 march 2016"))["mday"]; ?>

    <!-- La ligne ci-dessus est équivalente à : -->
    <!-- <?php
      $timestampFirstMarch = strtotime ("-1 day 1 march 2016");
      $dteLastDayFeb = getdate($timestampFirstMarch);
      echo "<br> Nb jours en février 2016 : " . $dteLastDayFeb["mday"];
    ?> -->
  </p>
    
<?php include "..\..\bottom_html.php"; ?>