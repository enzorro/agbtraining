<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  echo validation_errors();
?>
<div class="row padding-top-15">
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Admin
      </div>
      <div class="col-md-12">
        <?php 
          ver($results_admin);
        ?>
      </div>
    </div>
  </div>
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Entrenador
      </div>
      <div class="col-md-12">
        <?php 
          ver($results_entrenadore);
        ?>
      </div>
    </div>
  </div>
  <div class="col-md-4 padding-0">
    <div class="row margin-left-15 margin-right-15">
      <div class="col-md-12 text-celeste negrita">
        Pupilo
      </div>
      <div class="col-md-12">
        <?php 
          ver($results_pupilo);
        ?>
      </div>
    </div>
  </div>
</div>
