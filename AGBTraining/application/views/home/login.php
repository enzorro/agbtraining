<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	echo validation_errors();
	if(isset($error_message)){
		// Ha fallado el login
		// Cogemos el error que ha devuelto
		$error_message = " 	<div class='alert alert-warning'>
						  		<strong>Warning!</strong> $error_message
							</div>"; 
	}

?>
			
    <div class="row">
        <div class="col-lg-12">
        	<h1 class="text-center">Login</h1>
        </div>
    </div>
	
    <div class="row">
	            
        <div class="col-lg-4"></div>   

        <div class="col-lg-4">
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
        </div>

        <div class="col-lg-4"></div>

    </div>
