<?php session_start() ?>

<?php require_once("../controllers/controller_courseInscritProfil.php") ?>

<?php include('../elements/top.php') ?>

<?php include('../elements/header.php');

?>




<div class="text-center mt-5 mb-5 p-0 fw-bolder mt-5 mb-5 fs-4">
  <p>HISTORIQUE <i class=" logoDashbaord fa-solid fa-folder-open"></i></p>
</div>

<div class="text-center mt-5 mb-5 p-0 fw-bolder fs-5">
  <p>Course en attente de validation des km<i class=" logoDashbaord fa-solid fa-hourglass-half"></i></p>
</div>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_id']) { ?>
  <div class="row m-0 p-0 ">
    <div class="table-responsive tableStyle">
      <table class="table table-striped ">

        <thead class="text-center ">
          <tr class="table-primary ">
            <th scope="col">Nom de la Course</th>
            <th scope="col"> Personne Inscrite</th>
            <th scope="col">Type</th>
            <th scope="col">Date</th>
            <th scope="col">nombre de km</th>
          </tr>
        </thead>
        <tbody class="text-center">

          <?php
          foreach ($getAllUserEvents as $value) {
            if ($value['inscription_validate'] == 0)
          ?>
            <tr>
              <td><?= $value['event_name'] ?></td>
              <td><?= $value['user_pseudo'] ?></td>
              <td><?= $value['category_type'] ?></td>
              <td><?= $value['event_date'] ?></td>
              <td>
                <!-- bouton valider la distance -->


                <?php if ($value['inscription_validate'] == 1) { ?>
                  <p class="text-success">km validés</p>
                <?php } else { ?>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#validateKm-<?= $value['inscription_id'] ?>">
                    Valider
                  </button>
                <?php } ?>
              </td>

              <!-- modal de confirmation pour valider les km la course -->

              <div class="modal fade" id="validateKm-<?= $value['inscription_id'] ?>" tabindex="-1" aria-labelledby="validateKm" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Validation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Voulez vous valider la distance pour le coureur: <?= $value['user_pseudo'] ?>?
                    </div>
                    <div class="modal-footer">
                      <form action="" method="post">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                        <input type="hidden" name="validate" value="<?= $value['inscription_id'] ?>">
                        <button class="btn btn-success">Oui</button>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>
  </div>

<?php } ?>




<div class="text-center mt-5 mb-5 p-0 fw-bolder fs-5">
  <p>Inscription(s) en cours <i class="logoDashbaord fa-solid fa-file-signature"></i></p>
</div>

<div class="row m-0 p-0">
  <div class="table-responsive tableStyle">
    <table class="table table-striped">
      <thead class="text-center">
        <tr class="table-primary ">
          <th scope="col">Nom de la Course</th>
          <th scope="col">Type</th>
          <th scope="col">Date</th>
          <th scope="col">nombre de km</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $total = 0 ?>
        <?php foreach ($historique as $value) {

          if ($value['inscription_validate'] == 1) {
            continue;
          }
        ?>
          <tr>
            <th scope="row"><?= $value['event_name'] ?></th>
            <td><?= $value['category_type'] ?></td>
            <td><?= $value['event_date'] ?></td>
            <td><?= $value['event_distance'] ?>Km</td>
          </tr>
        <?php
          $total += intval($value['event_distance']);
        } ?>

      </tbody>
    </table>
  </div>
</div>




<div class="text-center mt-5 mb-5 p-0 fw-bolder fs-5">
  <p> Courses participées <i class=" logoDashbaord fa-solid fa-circle-check"></i></p>
</div>



<div class="row m-0 p-0 ">
  <div class="table-responsive ">
    <table class="table table-striped">
      <thead class="text-center">
        <tr class="table-primary ">
          <th scope="col">Nom de la Course</th>
          <th scope="col">Type</th>
          <th scope="col">Date</th>
          <th scope="col">nombre de km</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $total = 0 ?>
        <?php foreach ($historique as $value) {
          if ($value['inscription_validate'] == 0) {
            continue;
          }
        ?>
          <tr>
            <th scope="row"><?= $value['event_name'] ?></th>
            <td><?= $value['category_type'] ?></td>
            <td><?= $value['event_date'] ?></td>
            <td><?= $value['event_distance'] ?>Km</td>
          </tr>
        <?php
          $total += intval($value['event_distance']);
        } ?>

      </tbody>
    </table>
  </div>
</div>






<div class="row  m-0 me-5 p-0">

  <div class="col d-flex justify-content-end">
    <p class="fw-bolder text-primary">Total de km parcouru: <br> <?= $total ?>km</p>
  </div>
</div>

<div class="text-center mt-5 p-0 fw-bolder fs-5">
  <p> Courses créées <i class="logoDashbaord fa-solid fa-flag-checkered"></i></p>
</div>

<div class="row m-0 p-0">
  <div class="table-responsive tableStyle">
    <table class="table table-striped">
      <thead class="text-center">
        <tr class="table-primary ">
          <th scope="col">Nom de la Course</th>
          <th scope="col">Type</th>
          <th scope="col">nombre de km</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $total = 0 ?>
        <?php foreach ($allEvents as $value) { ?>

          <tr>
            <th scope="row"><?= $value['event_name'] ?></th>
            <td><?= $value['category_type'] ?></td>
            <td><?= $value['event_distance'] ?>Km</td>
          </tr>
        <?php
          $total += intval($value['event_distance']);
        } ?>

      </tbody>
    </table>
  </div>
</div>





<?php include('../elements/footer.php') ?>