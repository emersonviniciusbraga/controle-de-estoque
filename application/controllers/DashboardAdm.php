<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdm extends CI_Controller {
	public function __construct(){

		parent::__construct();
		
		
	}

	public function index()
	{
		// $this->load->model('products_model');
		// $dados['produto'] = $this->products_model->index();
		$dados['titulo'] = 'Painel de Controle';
		$this->load->view('dashboard-admin', $dados);
	}
}