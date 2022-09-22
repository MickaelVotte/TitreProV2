<?php session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');
require_once "../controllers/controller_calendar.php";
?>





<div class="banner-image4">
    <div class="text-center m-5 p-0">
        <div class="titleAccueil text-white hrLigne">Créer un évènement</div>
    </div>

    <div class="d-flex justify-content-center m-5">
        <a class="btn-login3" href="../view/editEvent.php">Créer un évènement</a>
    </div>
</div>






<div>
    <div class="text-center mt-5 mb-5">
        <p class="titleAccueil">Calendrier</p>
    </div>
</div>



<div class="mb-5 ">
    <div class="text-center ">
        <h2><a class="btn" href="event.php?"><i class=" logoCalendar bi bi-chevron-double-left me-2"></i></a><?= $year ?><a class="btn" href="event.php?<?= isset($_GET['month']) ? 'month=' . $_GET['month'] . '&' : '' ?>year=<?= $year + 1 ?>"><i class=" logoCalendar bi bi-chevron-double-right ms-2"></i></a></h2>
        <h2><a class="btn" href="event.php"><i class=" logoCalendar bi bi-chevron-left me-1"></i></a><?= $monthLetters ?><a class="btn" href="event.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 12 ? 1 : $monthNumber + 1 ?>"><i class="logoCalendar bi bi-chevron-right ms-1"></i></a></h2>
    </div>
    <div class="row justify-content-center p-0 mt-3 mx-0 ">
        <div class="col-10 calendar p-0 m-0">

            <!-- Nous réalisons une boucle pour afficher les jours de la semaine -->
            <?php
            foreach ($days as $key => $value) { ?>
                <div class="text-center  week-days"><?= $value ?></div>
            <?php } ?>


            <!-- Nous allons dessiner le nombre de cases correspondant au total de cases nécessaires au calendrier -->
            <?php
            for ($i = 1; $i <= $totalCases; $i++) { ?>
                <?= createCase($firstCaseTimestamp, $i, $monthNumber, $arraySpecialDays) ?>
            <?php } ?>

        </div>
    </div>



</div>








<?php include('../elements/footer.php') ?>