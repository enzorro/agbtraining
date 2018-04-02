<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sesione extends CI_Controller {

		public function __construct(){
	        parent::__construct();
	        $this->load->model("sesione_model");
	    }

		public function login(){
			ver();

		}

	}
