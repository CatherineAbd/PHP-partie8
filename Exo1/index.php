<?php 
  include "..\\top_p8.php";
  echo "Exercice 1";
  ?>
  <p class="topic">Afficher la date courante en respectant la forme jj/mm/aaaa (ex : 16/05/2016).<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
  <p>Date courante :  <?= date("d/m/Y"); ?></p>

  <!-- méthode objet -->
  <?php
    $date = new DateTime();
    echo $date->format("j/m/y");
    var_dump($date);
    echo $date->date;
  ?>
    
<?php include "..\..\bottom_html.php"; ?>