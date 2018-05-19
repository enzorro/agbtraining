<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearUsuario extends CI_Controller {

	public function __construct(){
        // Cargamos el modelo necesario
        parent::__construct();
        //$this->load->model("");
        //session_start();
    }

	public function index($data=null){
        $this->load->model('usuario_model');    //cargamos el archivo usuario_model.php
        
        //establecemos la URL para las paginas
        $config['base_url'] = base_url().'/admin/crear/';
        
        // Para saber donde estamos
        $menu = array('tipo' => 'admin', 'pagina' => 'crear_usuario');
		
        // Cargamos las vistas necesarias
		$this->load->view('layout/head');
        $this->load->view('layout/navbar',$menu);
		$this->load->view('admin/crearUsuario',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_js');
	}
	
}
