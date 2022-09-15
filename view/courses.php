<?php session_start(); ?>
<?php

require_once "../models/Database.php";
require_once "../models/Categories.php";
require_once "../models/Departement.php";
require_once "../controllers/controller_editEvent.php";
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
            <select class="inputfield3" id="department" name="departement">
                <option value="" selected disabled>Veuillez selectionner un departement</option>
                <?php foreach ($arrayDepartment as $value) { ?>
                    <option value="<?= $value['departement_id'] ?>"><?= $value['departement_name'] ?></option>
                <?php  } ?>
            </select>
        </div>


        <div class="col-lg-4 col-sm-12 ">
            <div class="dropdown">

                <select class="inputfield3" id="distance" name="distance" onclick="deletemessageError('errorDistance')">
                    <option value="">Veuillez choisir une distance</option>
                       <option value="">5km</option>
                       <option value="">10km</option>
                       <option value="">15km</option>
                       <option value="">21km</option>
                       <option value="">42km</option>
                    </select>
            </div>
        </div>




        <div class="col-lg-4 col-sm-12">

            <div class="dropdown">
                <select class="inputfield3" id="type" name="type">
                    <option value="" selected disabled>Veuillez selectionner une catégorie</option>
                    <?php foreach ($arrayCategories as $value) { ?>
                        <option value="<?= $value['category_id'] ?>"><?= $value['category_type'] ?></option>
                    <?php } ?>
                </select>

            </div>
        </div>
    </div>
</div>




<div class="text-center mt-5">
    <button> Rechercher</button>
</div>


</div>

</div>








<div>
    <div class="row justify-content-md-center m-0 p-3 mt-5 mb-5">
        <?php for ($i = 0; $i < 4; $i++) { ?>
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






<div class="col-lg-3 col-sm-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-image"></div>
                    <div class="card-title">
                        <span class="date">date</span>
                        <h3 class="fw-bolder">Marathon</h3>
                        <span>distance</span>
                    </div>
                    <div class="card-paragraph">
                        <p>Nom de la course</p>
                        <p>Privbeighb nefkj zfpij z,jfjpzfrejp Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae unde vero modi consectetur optio voluptas error sit! </p>
                    </div>
                    <div class="card-bottom">
                        <div class="stat">
                            <p>heure de départ</p>
                            <p>heure de fin</p>
                           <p>nombre de participant</p> 
                            <a class="btncard" href="#">En savoir plus</a>

                        </div>
                    </div>
                </div>
            </div>






<?php include('../elements/footer.php') ?>