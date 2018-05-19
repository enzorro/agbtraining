<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  echo validation_errors();
?>
<div class="row padding-top-15">
  <div class="col-md-12 text-right padding-right-30">
      <a href="<?= site_url($crear_usuario) ?>"><button class="pointer">Crear</button></a>
  </div>
</div>
<div class="row padding-top-15">
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Admin
      </div>
      <div class="col-md-12 padding-0 padding-top-15">
        <table id="myTable1" class="table table-striped table-condensed-xs">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
            <?php
              foreach($results_admin as $admin){
            ?>
                <tr>
                  <td><?= $admin->idusuario ?></td>
                  <td><?= $admin->nombre ?></td>
                </tr>
            <?php
              }
            ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Entrenador
      </div>
      <div class="col-md-12 padding-0 padding-top-15">
        <table id="myTable2" class="table table-striped table-condensed-xs">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
            <?php
              foreach($results_entrenadore as $entrenadore){
            ?>
                <tr>
                  <td><?= $entrenadore->idusuario ?></td>
                  <td><?= $entrenadore->nombre ?></td>
                </tr>
            <?php
              }
            ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Pupilo
      </div>
      <div class="col-md-12 padding-0 padding-top-15">
        <table id="myTable3" class="table table-striped table-condensed-xs">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
            <?php
              foreach($results_pupilo as $pupilo){
            ?>
                <tr>
                  <td><?= $pupilo->idusuario ?></td>
                  <td><?= $pupilo->nombre ?></td>
                </tr>
            <?php
              }
            ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
