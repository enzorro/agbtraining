<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        // Cargamos el modelo necesario
        parent::__construct();
        //$this->load->model("");
        //session_start();
    }

	public function index($data=null){
        $this->load->model('usuario_model');    //cargamos el archivo usuario_model.php
        
        //establecemos la URL para las paginas
        $data['crear_usuario'] = 'crearUsuario/index';
        
        //llamo para que me retorne los resultados con los datos.
        $data['results_admin']       = $this->usuario_model->get_usuarios(TIPO_ADMIN);
        $data['results_entrenadore'] = $this->usuario_model->get_usuarios(TIPO_ENTRENADOR);
        $data['results_pupilo']      = $this->usuario_model->get_usuarios(TIPO_PUPILO);
 
        // Para saber donde estamos
        $menu = array('tipo' => 'admin', 'pagina' => 'index');
		
        // Cargamos las vistas necesarias
		$this->load->view('layout/head');
        $this->load->view('layout/navbar',$menu);
		$this->load->view('admin/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_js');
	}
	
}
