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
        // Comprobar si ya esta logueado el cliente
        if(isset($_SESSION['idsesion'])){
            //redirigir a la vista correspondiente si sigue existiendo la sesion
            $existe_sesion = $this->usuario_model->session_existe($_SESSION['idsesion']);

            if($existe_sesion){
                // Redirigimos a su pagina correspondiente
                ver('redirigir');
            } else {
                // No existe sesion
                // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
                // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                // Finalmente, destruir la sesión.
                session_destroy();
                // Redirigir al login
                $this->index();
            }
        }
        else{
            // Cargamos las vistas necesarias
            $this->load->view('layout//head');
            $this->load->view('home/login',$data);
            $this->load->view('layout/footer');
            $this->load->view('layout/footer_js'); 
        }
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
    				$idsesion = $this->usuario_model->session_crear($respuesta);
    				// Creamos _sesiones
    				$_SESSION['idusuario'] 	= $respuesta->idusuario;
    				$_SESSION['idsesion']	= $idsesion;
                    $_SESSION['tipo']       = $respuesta->tipo;
                    //Redirigimos al usuario
                    switch ($respuesta->tipo) {
                        //admin
                        case TIPO_ADMIN:
                            redirect('/admin/index');
                            break;
                        //entrenador
                        case TIPO_ENTRENADOR:
                            redirect('/entrenador/index');
                            break;
                        //pupilo
                        case TIPO_PUPILO:
                            redirect('/pupilos/index');
                            break;
                    }
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
