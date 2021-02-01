<?php 
  include "..\\top_p8.php";
  ?>
  <p class="topic">Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.  
En fonction des choix, afficher un calendrier comme celui-ci : <br>
  </p>
  <hr>
  <p class="topicTitle">Résultats</p>

  <?php 
    if (empty($_POST["myMonth"]) || empty($_POST["myYear"])){?>
      <form action="" method="post">
        <label for="myMonth">Saisissez le mois : </label>
        <select name="myMonth" id="myMonth">
          <option value="1">Janvier</option>
          <option value="2">Février</option>
          <option value="3">Mars</option>
          <option value="4">Avril</option>
          <option value="5">Mai</option>
          <option value="6">Juin</option>
          <option value="7">Juillet</option>
          <option value="8">Août</option>
          <option value="9">Septembre</option>
          <option value="10">Octobre</option>
          <option value="11">Novembre</option>
          <option value="12">Décembre</option>
        </select>

        <label for="myYear">Saisissez l'année : </label><input type="number" name="myYear" id="myYear" min="1900" max="2100">
        <input type="submit" value="Afficher le calendrier">
      </form>
    <?php
    } else{ 
      // Number days in the month and first day in month (1 or 2 digits)
      $nextMonth = $_POST["myMonth"] + 1;
      $nbDaysInMonth = getdate(strtotime("-1 day" . $nextMonth . "/01/" . $_POST["myYear"]))["mday"];
      $firstDayMonth = getdate(strtotime($_POST["myMonth"] . "/01/" . $_POST["myYear"]))["wday"];

      setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"]);
      $monthFrench = strftime("%B", strtotime($_POST["myMonth"] . "/01/" . $_POST["myYear"]));
    ?>

      <!-- Building of calendar -->

      <!-- <div class="container"> -->

        <!-- test sur inline in block pour centrage -->
        <div>
        <h1 class="titleCalendar"><?= $monthFrench . " " . $_POST["myYear"]?></h1>
        </div>
        <div class="conTable">
        <table class="table">
          <thead>
            <tr>
              <th>Lundi</th>
              <th>Mardi</th>
              <th>Mercredi</th>
              <th>Jeudi</th>
              <th>Vendredi</th>
              <th>Samedi</th>
              <th>Dimanche</th>
            </tr>
          </thead>
          <?php
          $end = false;
          $ctDay = 1;
          $nbRow = 1;
            // loop for rows
            while ($ctDay <= $nbDaysInMonth){ ?>
              <tr>
              <?php
              // loop for columns
              for ($i=0; $i<7; $i++){
                // cellules vides
                if ((($i < $firstDayMonth - 1) && ($nbRow==1)) || ($ctDay>$nbDaysInMonth)){ ?>
                  <td style="background-color: lightgray;"></td>
                <?php }else { ?>
                  <td><?= $ctDay?></td>
                  <?php
                  $ctDay++;
                 }
              }
              $nbRow++;
              ?>
              </tr>
            <?php } ?>
          <tr></tr>
        </table>
        </div>
      <!-- </div> -->

    <?php } ?>
<?php include "..\bottom_p8.php"; ?>