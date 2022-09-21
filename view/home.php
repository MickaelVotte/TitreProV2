<?php session_start() ?>
<?php require_once '../controllers/controller_calendar.php';

?>



<?php include('../elements/top.php') ?>

<?php include('../elements/header.php');?>
<body>


    <div class="banner-image w-100 d-flex justify-content-center align-items-center">

        <div class=" container text-center">
            <h1><span class="text1">Running Race</span></h1>
        </div>
    </div>






    <div class="text-center m-5 p-0">
        <div class="titleAccueil hrLigne">Page d'Accueil</div>
    </div>



    <div class="containerHome">

        <div class="row d-flex justify-content-evenly m-0 p-3 mt-5 mb-5">
            <div class="card col-lg-4 col-12 m-0 p-0">
                <div class="card">
                    <img src="../assets/img/firstcard.jpg" alt="" class="card-image"></img>
                    <div class="card-title">
                        <span class="date">Il y a 3 jours</span>
                        <h3 class="fw-bolder">Course à pied</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Participer à une course de course à pied près de chez vous. Nous regouper les courses de la region Normandie en plusieurs categories.
                            Selon la distance, le department.
                        </p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="./courses.php">En savoir plus</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-lg-4 col-12 m-0 p-0">
                <div class="card">
                <img src="../assets/img/firstcard.jpg" alt="" class="card-image"></img>
                    <div class="card-title">
                        <span class="date">Il y a 3 jours</span>
                        <h3 class="fw-bolder">Trial</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Privbeighb nefkj zfpij z,jfjpzfrejp Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae unde vero modi consectetur optio voluptas error sit! Ut odit amet dicta excepturi ad quo necessitatibus cupiditate, facilis, eaque ratione in!</p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" card col-lg-4 col-12 m-0 p-0">
                <div class="card">
                <img src="../assets/img/firstcard.jpg" alt="" class="card-image"></img>
                    <div class="card-title">
                        <span class="date">Il y a 3 jours</span>
                        <h3 class="fw-bolder">Évènement</h3>
                    </div>
                    <div class="card-paragraph">
                        <p>Privbeighb nefkj zfpij z,jfjpzfrejp Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae unde vero modi consectetur optio voluptas error sit! Ut odit amet dicta excepturi ad quo necessitatibus cupiditate, facilis, eaque ratione in!</p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <a class="btncard" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <div class="banner-image2 w-100 d-flex justify-content-center align-items-center">
   
</div>



    <div>
        <div class="text-center mt-5 mb-5">
            <p class="titleAccueil">Calendrier</p>
        </div>
    </div>



    <div class="mb-5">
        <div class="text-center">
            <h2><a class="btn" href="home.php?"><i class=" logoCalendar bi bi-chevron-double-left me-2"></i></a><?= $year ?><a class="btn" href="home.php?<?= isset($_GET['month']) ? 'month=' . $_GET['month'] . '&' : '' ?>year=<?= $year + 1 ?>"><i class=" logoCalendar bi bi-chevron-double-right ms-2"></i></a></h2>
            <h2><a class="btn" href="home.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 1 ? 12 : $monthNumber - 1 ?>"><i class=" logoCalendar bi bi-chevron-left me-1"></i></a><?= $monthLetters ?><a class="btn" href="home.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 12 ? 1 : $monthNumber + 1 ?>"><i class="logoCalendar bi bi-chevron-right ms-1"></i></a></h2>
        </div>
        <div class="row justify-content-center p-0 mt-3 mx-0">
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


    <div class="banner-image3 w-100 d-flex justify-content-center align-items-center">
   
   </div>
</body>
 
    <?php include('../elements/footer.php') ?>
