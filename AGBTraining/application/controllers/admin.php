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
        $this->load->library('pagination');     //cargamos la libreria de paginacion
        $this->load->library('table');          //cargamos la libreria para el manejo de tablas
        $this->load->model('usuario_model');    //cargamos el archivo usuario_model.php
        
        //establecemos la URL para las paginas
        $config['base_url'] = base_url().'/admin/index/';
        //llamo a una funcion del modelo que me retorna la cantidad de usuarios que tengo en la tabla.
        $config['total_rows_admin']         = $this->usuario_model->get_usuarios_cantidad(TIPO_ADMIN);
        $config['total_rows_entrenadore']   = $this->usuario_model->get_usuarios_cantidad(TIPO_ENTRENADOR);
        $config['total_rows_pupilo']        = $this->usuario_model->get_usuarios_cantidad(TIPO_PUPILO);
        //cantidad de filas a mostrar por pagina
        $config['per_page'] = '5';
 
        // le paso el vector con mis configuraciones al paginador
        $this->pagination->initialize($config);
         
        //llamo para que me retorne los resultados con los datos.
        $data['results_admin']       = $this->usuario_model->get_usuarios(TIPO_ADMIN,$config['per_page'],$this->uri->segment(3));
        $data['results_entrenadore'] = $this->usuario_model->get_usuarios(TIPO_ENTRENADOR,$config['per_page'],$this->uri->segment(3));
        $data['results_pupilo']      = $this->usuario_model->get_usuarios(TIPO_PUPILO,$config['per_page'],$this->uri->segment(3));
 
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
