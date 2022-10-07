<?php session_start(); ?>
<?php
require_once "../controllers/controller_calendar.php";

include('../elements/top.php');
include('../elements/header.php');
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
        <div class="col-10 calendar p-0 m-0 justify-content-center">

            <!-- Nous réalisons une boucle pour afficher les jours de la semaine -->
            <?php
            foreach ($days as $key => $value) { ?>
                <div class="text-center  week-days"><span class="d-lg-block d-none"><?= $value ?></span>
                    <span class="d-lg-none d-block"><?= $value[0] ?></span>
                </div>

            <?php } ?>


            <!-- Nous allons dessiner le nombre de cases correspondant au total de cases nécessaires au calendrier -->
            <?php
            for ($i = 1; $i <= $totalCases; $i++) { ?>
                <?= createCase($firstCaseTimestamp, $i, $monthNumber, $arraySpecialDays) ?>
            <?php } ?>

        </div>
    </div>



</div>







<!-- Boucles pour la modale des courses-->

<?php foreach ($getEventCalendar as $value) { ?>

<div class="modal fade" id="modalDay-<?= strtotime($value['event_date']) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Course(s) programmée(s) pour le : <?= date_format(date_create($value['event_date']),"d/m/Y") ?></h1>
            </div>
            <div class="modal-body">
                <ul>
                    <?php
                    // je transforme en tableau le string contenant les ids
                    $arrayEventsId = explode('-', $value['all_events_id']);
                    // je transforme en tableau le string contenant les noms des événements
                    $arrayEventsName = explode('-', $value['all_events_name']);

                    // je fais une boucle permettant le nom des événements avec un lien direct
                    foreach ($arrayEventsId as $key => $value) { ?>
                        <a href="oneCourseInfo.php?eventId=<?= $value ?>" class="text-decoration-none"><li><?= $arrayEventsName[$key] ?></li></a>
                    <?php } ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php } ?>







<div class="text-center legendCalendar">
    <i class="iconCalendar2 bi bi-trophy-fill"> : Correspond à une course</i>
</div>

<div class="row justify-content m-0 p-0 mb-5">
    <div class=" col-lg-4 col-sm-12 text-start m-0 p-0 blockLegend ">
        <p class="legendgris"></p>
        <p>: Correspond au jours contenant  une course</p>
    </div>
    <div class=" col-lg-4 col-sm-12 text-start m-0 p-0 blockLegend ">
        <p class="legendGrisClair"></p>
        <p>: Correspond au jours du mois actuel</p>
    </div>
    <div class=" col-lg-4 col-sm-12 text-start m-0 p-0 blockLegend ">
        <p class="legendBlueF"></p>
        <p>: Correspond à la date d'aujourd'hui</p>
    </div>

</div>






<?php include('../elements/footer.php') ?>