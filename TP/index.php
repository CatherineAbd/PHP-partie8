<?php 
  include "..\\top_p8.php";
?>

<p class="topic">Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.  
En fonction des choix, afficher un calendrier comme celui-ci : <br>
</p>
<hr>
<p class="topicTitle">Résultats</p>

<form action="" method="post">
  <div class="divForm">
    <div class="formMonth">
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
    </div>

    <div class="formYear">
      <label for="myYear">Saisissez l'année : </label><input type="number" name="myYear" id="myYear" min="1900" max="2100">
    </div>

    <div class="formBtn">
      <input type="submit" value="Afficher le calendrier">
    </div>
  </div>
</form>

<?php
  $showCalendar = false;

  // Page's Call by press < > buttons
  if (!empty($_GET["myMonth"]) && !empty($_GET["myYear"]) && !empty($_GET["direction"])){
    $myMonth = $_GET["myMonth"];
    $myYear = $_GET["myYear"];
    if ($_GET["direction"] == "left"){
      if ($myMonth == 1){
        $myMonth = 12;
        $myYear--;
      } else {
        $myMonth--;
      }
    } else {
      if ($myMonth == 12){
        $myMonth = 1;
        $myYear++;
      } else {
        $myMonth++;
      }
    }
    $showCalendar = true;
  }

  // Page's Call by press show Calendar button
  if (!empty($_POST["myMonth"]) && !empty($_POST["myYear"])) {
    // Number days in the month and first day in month (1 or 2 digits)
    $myMonth = $_POST ["myMonth"];
    $myYear = $_POST["myYear"];
    $showCalendar = true;
  }

  // building of calendar
  if ($showCalendar) {
    if ($myMonth == 12) {
      $nextMonth = 1;
      $myYearNextMonth = $myYear + 1;
    } else {
      $nextMonth = $myMonth + 1;
      $myYearNextMonth = $myYear;
    }
    $nbDaysInMonth = getdate(strtotime("-1 day" . $nextMonth . "/01/" . $myYearNextMonth))["mday"];
    $firstDayMonth = getdate(strtotime($myMonth . "/01/" . $myYear))["wday"];

    setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"]);
    $monthFrench = strftime("%B", strtotime($myMonth . "/01/" . $myYear));
  ?>

  <!-- Building of calendar -->

  <div class="titleTable conTable">
    <?php
      $myGet = "index.php?myMonth=$myMonth&myYear=$myYear&direction=left";
    ?>
    <a href= <?= $myGet ?> class="arrowLeft"><i class="fas fa-angle-left"></i></a>
    <span><?= utf8_encode($monthFrench) ?> <?= $myYear ?></span>
    <?php
      $myGet = "index.php?myMonth=$myMonth&myYear=$myYear&direction=right";
    ?>
    <a href=<?= $myGet ?> class="arrowRight"><i class="fas fa-angle-right"></i></a>
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

<!-- fin if $showCalendar -->
<?php } ?>

<?php include "..\bottom_p8.php"; ?>