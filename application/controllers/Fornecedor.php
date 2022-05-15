<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

	public function __construct(){

		parent::__construct();
		// permission();
		
	}
	
	public function index() {

		$this->load->model('fornecedor_model');
		$dados['fornecedores'] = $this->fornecedor_model->index();	
		$dados['titulo'] = 'Fornecedores';
		$this->load->view('fornecedores', $dados);

	}

	public function pesquisar() {

		$this->load->model('busca_model');	
		$dados['titulo'] = 'Resultado da Pesquisa por *'.$_POST['busca'].'*';
		$dados['resultado'] = $this->busca_model->buscarFornecedores($_POST);
		$this->load->view('resultado-fornecedores', $dados);

	}

	public function new(){

		$dados['titulo'] = 'Cadastro de Fornecedores';
		$dados['nome'] = 'Cadastro de Fornecedores';
		$this->load->view('form-fornecedores', $dados);
	}

	public function store(){

		$fornecedor = $_POST;
		$fornecedor['usuario_idusuario'] = '1';
		$this->load->model('fornecedor_model');

		if(!$this->fornecedor_model->verificaCnpj($fornecedor['cnpj'])){
			$this->fornecedor_model->store($fornecedor);
			$this->session->set_flashdata('sucesso', 'Cadastrado com sucesso!');
			redirect('fornecedor');
		}else{
			$this->session->set_flashdata('error', 'Error ao cadastrar, CNPJ já cadastrado!');
			redirect('fornecedor/new');
		}
	}

	public function edit($idfornecedor) {

		$this->load->model('fornecedor_model');
		$dados['fornecedores'] = $this->fornecedor_model->show($idfornecedor);
		$dados['titulo'] = 'Editar Fornecedor';
		$dados['nome'] = 'Editar Fornecedor';
		$this->load->view('form-fornecedores', $dados);

	}

	public function update($idfornecedor){

		$this->load->model('fornecedor_model');
		$fornecedores = $_POST;
		$this->fornecedor_model->update($idfornecedor, $fornecedores);
		redirect('fornecedor');
	}

}