<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        // Cargamos el modelo necesario
        parent::__construct();
        $this->load->model("usuario_model");
        session_start();
    }

	public function index($data=null){
		// Cargamos las vistas necesarias
		$this->load->view('layout//head');
		$this->load->view('home/login',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_js');
	}

	public function login(){
		// Variables que usaremos
		$error 			= false;
		$error_message 	= "";
      	$email    		= $this->input->post("email");
     	$password 		= $this->input->post("password");

     	// Comprobamos que el correo tiene un formato correcto
     	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
     		// Encroptamos el pass
     		//$passHash 	= password_hash($password, PASSWORD_BCRYPT);
     		$passHash 	= $password;
     		// Hacemos la llamada al modelo
     		$respuesta 	= $this->usuario_model->get_login($email,$passHash);
			// Comprobamos si tenemos respuesta
    		if(!$respuesta){
    			$error = true;
    			$error_message = "Usuario o contraseña incorrecto";
    		}else {
    			/*Comprobar contraseña*/
    			//if(password_verify($respuesta->password, $passHash)){
    			if( $respuesta->password == $passHash ){
    				/*Logueo correcto*/
    				$idsesion = $this->usuario_model->create_session($respuesta);
    				// Creamos _sesiones
    				$_SESSION['idusuario'] 	= $respuesta->idusuario;
    				$_SESSION['idsesion']	= $idsesion;
    			}else{ 
    				/*La contraseña es incorrecta, quitamos un intento*/
	    			$error = true;
	    			$error_message = "Usuario o contraseña incorrecto";
    			}
    		}
		}else{
			$error = true;
			$error_message = "Usuario incorrecto";
     	}      

     	if($error){
     		// Si ha dado error enviamos el error a la vista para que lo imprima
     		$data = array(
            	'error_message' => $error_message
        	);
     		// Cargamos la vista del login
       		$this->index($data);
     	}
       	
	}
}
