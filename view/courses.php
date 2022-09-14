<?php session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');
?>





<div class="banner-image2 w-100 d-flex justify-content-center align-items-center">
    <div class="text-center text-white fs-1 fw-bolder">
        Running Race
    </div>
</div>

<div class="text-center">
<div class="row justify-content-md-center m-0 p-0 mt-5 bodyCourses   border border-primary ">
    <div class="col-lg-4 col-sm-12">
        <button class="btn btn-secondary dropdown-toggle ms-2 me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Selectionner un département
        </button>
        <ul class="dropdown-menu text-ccenter">
            <li><a class="dropdown-item" href="#">Calvados</a></li>
            <li><a class="dropdown-item" href="#">Eure</a></li>
            <li><a class="dropdown-item" href="#">Manche</a></li>
            <li><a class="dropdown-item" href="#">Seine-maritimes</a></li>
            <li><a class="dropdown-item" href="#">Orne</a></li>
        </ul>
    </div>

    <div class="col-lg-4 col-sm-12 ">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle ms-2 me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                choississez une distance
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">5km</a></li>
                <li><a class="dropdown-item" href="#">10km</a></li>
                <li><a class="dropdown-item" href="#">15km</a></li>
                <li><a class="dropdown-item" href="#">21km</a></li>
                <li><a class="dropdown-item" href="#">45km</a></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4 col-sm-12">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle ms-2 me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Type de course
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Marathon</a></li>
                <li><a class="dropdown-item" href="#">Trial</a></li>
                <li><a class="dropdown-item" href="#">Evenement</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="text-center mt-5">
    <button> Rechercher</button>
</div>


</div>










<div >
    <div class="row justify-content-md-center m-0 p-3 mt-5 mb-5">
    <?php for ($i = 0; $i < 15; $i++) { ?>
                <div class="col-lg-3 col-sm-12 mt-5 mb-5">
                    <div class="card">
                        <div class="card-image"></div>
                        <div class="card-title">
                            <span class="date">Il y a 3 jours</span>
                            <h3 class="fw-bolder">Marathon</h3>
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


                <?php } ?>    
            </div>
        </div>

  











<?php include('../elements/footer.php') ?>