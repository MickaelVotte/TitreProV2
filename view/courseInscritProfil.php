<?php session_start() ?>

<?php require_once("../controllers/controller_courseInscritProfil.php") ?>

<?php include('../elements/top.php') ?>

<?php include('../elements/header.php');

?>




<div class="text-center mt-5 mb-5 p-0">
  <p>HISTORIQUE</p>
</div>

<div class="text-center mt-5 mb-5 p-0">
  <p>Course en attente de validation</p>
</div>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_id']) { ?>
  <div class="row m-0 p-0">
    <div class="table-responsive">
      <table class="table">

        <thead class="text-center">
          <tr>
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




<div class="text-center mt-5 mb-5 p-0">
  <p>Inscription(s) en cours</p>
</div>

<div class="row m-0 p-0">
  <div class="table-responsive">
    <table class="table">
      <thead class="text-center">
        <tr>
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




<div class="text-center mt-5 mb-5 p-0">
  <p> Courses participées </p>
</div>



<div class="row m-0 p-0 ">
  <div class="table-responsive">
    <table class="table">
      <thead class="text-center">
        <tr>
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
    <p class="fw-bolder">Total de km parcouru: <br> <?= $total ?>km</p>
  </div>
</div>

<div class="text-center mt-5  p-0">
  <p> Courses créées </p>
</div>

<div class="row m-0 p-0">
  <div class="table-responsive">
    <table class="table">
      <thead class="text-center">
        <tr>
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