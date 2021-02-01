<?php 
  include "..\\top_p8.php";
  echo "Exercice 3";
  ?>
  <p class="topic">Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)<br>
Bonus : Le faire en français.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
  <p>Date courante : <?= date("l j F Y"); ?></p>
  
  <!-- in French -->
  <?php setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"], ["fr_FR.UTF-8"]); ?>
  <p>Date courante in french please ! : <?= UTF8_encode(strftime("%A %e %B %Y"));?></p>
    
<?php include "..\..\bottom_html.php"; ?>