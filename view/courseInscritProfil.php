<?php session_start() ?>

<?php require_once("../controllers/controller_courseInscritProfil.php") ?>

<?php include('../elements/top.php') ?>

<?php include('../elements/header.php');
?>




<div class="text-center mt-5 mb-5 p-0">
  <p>HISTORIQUE</p>
</div>



<div class="text-center mt-5 mb-5 p-0">
  <p>Inscription(s) en cours</p>
</div>

<div class="row m-0 p-0">
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
      <?php foreach ($historique as $value) { 
        
        if ($value['inscription_validate'] == 1) {
          continue;
        }
      ?>
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




<div class="text-center mt-5  p-0">
  <p> Courses Participé </p>
</div>



<div class="row m-0 mt-5 p-0">
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
      <?php foreach ($historique as $value) {
        if ($value['inscription_validate'] == 0) {
          continue;
        }
      ?>

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






<div class="row  m-0 me-5 p-0">
  <div class="col d-flex justify-content-end">
    <p class="fw-bolder">Total de km parcouru: <br> <?= $total ?>km</p>
  </div>
</div>

<div class="text-center mt-5  p-0">
  <p> Courses crée </p>
</div>

<div class="row m-0 p-0">
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





<?php include('../elements/footer.php') ?>