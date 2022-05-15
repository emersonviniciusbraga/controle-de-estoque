<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function store(){

		$this->load->model('login_model');
		$cpf = $_POST['cpf'];
		$senha = md5($_POST['senha']);
		$user = $this->login_model->store($cpf, $senha);


		if(!$user){
			$this->session->set_userdata('logged_user', $user);
			$this->session->set_flashdata('success', 'Logado com sucesso!');
			
			redirect('dashboardAdm');
		}else{
			$this->session->set_flashdata('danger', 'Usuário e/ou senha inválidos!');
			redirect('login');
		}
	}

	public function logout(){

		$this->session->unset_userdata('logged_user');
		redirect('login');
	}
}
