<?php 
  include "..\\top_p8.php";
  echo "Exercice 7";
  ?>
  <p class="topic">Afficher la date du jour + 20 jours.<br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>

  <?php setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"], ["french"], ["fra.UTF8"]); ?>
  <p>Date courante + 20 jours : <?= utf8_encode(strftime("%A %e %B %Y", strtotime("+20 days"))) ?></p>

  <!-- méthode objet -->
  <?php 
    $date1 = new DateTime();
    // P period 20 D days
    $date1->add(new DateInterval("P20D"));
    echo "<br>" . $date1->format('d m Y');

  ?>

    
<?php include "..\..\bottom_html.php"; ?>