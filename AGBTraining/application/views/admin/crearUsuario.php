<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  echo validation_errors();
?>
<div class="row">

			    <?= isset($error_message) ? $error_message : "" ?>

        		<div class="col-lg-12 text-right form-inline">
        			<?= form_open('home/login') ?>

			       		<div class="form-group">
			                <label>Correo Electrónico :</label>
			                <?= form_input('email','','','form-control') ?>
			            </div>

			            <div class="form-group">
			     			<label>Contraseña :</laber>
				            <?= form_password('password','','','form-control') ?>
			            </div>	
		            	<button type="submit" >Go!</button>
		        	
    				<?= form_close() ?>
				</div>
	        </div>