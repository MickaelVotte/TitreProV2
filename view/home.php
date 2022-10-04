<?php session_start() ?>
<?php   require_once '../controllers/controller_calendar.php';
        require_once '../controllers/controller_home.php';
?>



<?php include('../elements/top.php') ?>

<?php include('../elements/header.php');

?>

<body>



    <div id="progress">
        <span id="progress-value"><i class=" GoToTop fa-solid fa-arrow-up"></i></i></span>
    </div>




    <div class="banner-image w-100 d-flex justify-content-center align-items-center">

        <div class=" container text-center">
            <h1><span class="text1">Running Race</span></h1>
        </div>
    </div>






    <div class="text-center mt-5 p-0">
        <div class="titleAccueil hrLigne comments m-0 p-0">Page d'Accueil</div>
    </div>



    <div class="containerHome">

        <section data-aos="fade-right" data-aos-offset="200" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" class="hidden row d-flex justify-content-evenly m-0 p-3 mt-5 mb-5">
            <div class="card col-lg-4 col-12 m-3 p-0">
                <div class="card">
                    <img src="../assets/img/trail.jpg" alt="" class="card-image"></img>
                    <div class="card-title">
                        <span class="date">Categorie</span>
                        <h3 class="fw-bolder">Course à pied</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Participer à une course de course à pied près de chez vous. Nous regouper les courses de la region Normandie en plusieurs categories.
                            Selon la distance, le department.
                        </p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="./courses.php?eventType=1">En savoir plus></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card col-lg-4 col-12 m-3 p-0">
                <div class="card">
                    <img src="../assets/img/courseaPied.jpg" alt="" class="card-image"></img>
                    <div class="card-title">
                        <span class="date">Categorie</span>
                        <h3 class="fw-bolder">Trail</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Participer à une course de trial près de chez vous. Nous regrouper les courses de trail de la région Normandie.</p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="./courses.php?eventType=2">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" card col-lg-4 col-12 m-3 p-0">
                <div class="card">
                    <img src="../assets/img/event.jpg" alt="" class="card-image m-0 p-0"></img>
                    <div class="card-title">
                        <span class="date">Categorie</span>
                        <h3 class="fw-bolder">Évènement</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Privbeighb nefkj zfpij z,jfjpzfrejp Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae unde vero modi consectetur optio voluptas error sit! </p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="./courses.php?eventType=3">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>



    </div>
    </section>



    <div class="banner-image2 w-100 d-flex justify-content-center align-items-center">

    </div>



    <div>
        <div class="text-center mt-5 mb-5">
            <p class="titleAccueil">Calendrier</p>
        </div>
    </div>

<div class="table-responsive">

    <div class="mb-5">
        <div class="text-center">
            <h2><a class="btn" href="home.php?"><i class=" logoCalendar bi bi-chevron-double-left me-2"></i></a><?= $year ?><a class="btn" href="home.php?<?= isset($_GET['month']) ? 'month=' . $_GET['month'] . '&' : '' ?>year=<?= $year + 1 ?>"><i class=" logoCalendar bi bi-chevron-double-right ms-2"></i></a></h2>
            <h2><a class="btn" href="home.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 1 ? 12 : $monthNumber - 1 ?>"><i class=" logoCalendar bi bi-chevron-left me-1"></i></a><?= $monthLetters ?><a class="btn" href="home.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 12 ? 1 : $monthNumber + 1 ?>"><i class="logoCalendar bi bi-chevron-right ms-1"></i></a></h2>
        </div>
        <div data-aos=fade-up data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" class="row justify-content-center p-0 mt-3 mx-0">
            <div class="col-10 calendar p-0 m-0">

                <!-- Nous réalisons une boucle pour afficher les jours de la semaine -->
                <?php
                foreach ($days as $key => $value) { ?>
                    <div class="text-center week-days"><?= $value ?></div>
                <?php } ?>


                <!-- Nous allons dessiner le nombre de cases correspondant au total de cases nécessaires au calendrier -->
                <?php
                for ($i = 1; $i <= $totalCases; $i++) { ?>
                    <?= createCase($firstCaseTimestamp, $i, $monthNumber, $arraySpecialDays) ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


<div class="text-center legendCalendar">
<i class="iconCalendar2 bi bi-trophy-fill"> : Correspond à une course</i>
</div>

    <div class="banner-image3 w-100 d-flex justify-content-center align-items-center">

    </div>



    <?php include('../elements/footer.php') ?>