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
        $menu = array('tipo' => 'admin', 'pagina' => 'index');
		// Cargamos las vistas necesarias
		$this->load->view('layout/head');
        $this->load->view('layout/navbar',$menu);
		$this->load->view('admin/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_js');
	}

	
}
