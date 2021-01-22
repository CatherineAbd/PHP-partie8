<?php 
  include "..\\top_p8.php";
  echo "Exercice 2";
  ?>
  <p class="topic">Afficher la date courante en respectant la forme jj-mm-aa (ex : 16-05-16).<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>
  <p>Date courante : <?= date("d-m-y"); ?></p>
    
<?php include "..\..\bottom_html.php"; ?>