
<?php session_start() ?>

<?php require_once("../controllers/controller_courseInscritProfil.php") ?>

<?php include('../elements/top.php') ?>

<?php include('../elements/header.php'); 
?>




<div class="text-center mt-5 p-0">
    <p>HISTORIQUE DES COURSES inscrites</p>
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
  <?php foreach ($historique as $value) { ?>

    <tr>
      <th scope="row"><?= $value['event_name'] ?></th>
      <td><?=$value['category_type']?></td>
      <td><?=$value['event_distance']?>Km</td>
    </tr>
    <?php 
    $total += intval($value['event_distance']);
} ?>

  </tbody>
</table> 
</div>

<div class="row d-flex justify-content-end m-0 p-0">
<p class="fw-bolder">Total de km parcouru:<?= $total ?>km</p>    
</div>


<?php include('../elements/footer.php') ?>
