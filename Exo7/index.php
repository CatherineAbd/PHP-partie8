<?php 
  include "..\\top_p8.php";
  echo "Exercice 7";
  ?>
  <p class="topic">Afficher la date du jour + 20 jours.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>

  <?php setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"], ["french"], ["fr_FR.utf8"]); ?>
  <p>Date courante + 20 jours : <?= strftime("%A %e %B %Y", strtotime("+20 days")) ?></p>
    
<?php include "..\..\bottom_html.php"; ?>