<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){

		parent::__construct();
		permissionUser();
		
	}

	public function index()
	{
		$dados['titulo'] = 'Painel de Controle';
		$this->load->view('dashboard', $dados);
	}
}