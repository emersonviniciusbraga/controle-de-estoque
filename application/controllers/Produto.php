<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct(){

		parent::__construct();
		// permission();
		
	}
	
	public function index() {

		$this->load->model('produto_model');
		$dados['produtos'] = $this->produto_model->index();	
		$dados['titulo'] = 'Produtos';
		$this->load->view('produtos', $dados);

	}

	public function ativos() {

		$this->load->model('produto_model');
		$dados['produtos'] = $this->produto_model->index();	
		$dados['titulo'] = 'Produtos';
		$this->load->view('produtos-ativos', $dados);

	}

	public function inativos() {

		$this->load->model('produto_model');
		$dados['produtos'] = $this->produto_model->index();	
		$dados['titulo'] = 'Produtos';
		$this->load->view('produtos-inativos', $dados);

	}

    public function pesquisar() {

		$this->load->model('busca_model');	
		$dados['titulo'] = 'Resultado da Pesquisa por *'.$_POST['busca'].'*';
		$dados['produtos'] = $this->busca_model->buscarProdutos($_POST);
		$this->load->view('produtos', $dados);

	}

	public function new(){

		$dados['titulo'] = 'Cadastro de Produtos';
		$dados['nome'] = 'Cadastro de Produtos';
		$this->load->view('form-produtos', $dados);
	}

	public function store(){

		$produto = $_POST;
		$produto['usuario_idusuario'] = '1';
		$this->load->model('produto_model');

		if(!$this->produto_model->verificaNome($produto['nome'])){
			$this->produto_model->store($produto);
			$this->session->set_flashdata('sucesso', 'Cadastrado com sucesso!');
			redirect('produto');
		}else{
			$this->session->set_flashdata('error', 'Error ao cadastrar, Produto já cadastrado!');
			redirect('produto/new');
		}
	}

	public function edit($idproduto) {

		$this->load->model('produto_model');
		$dados['produtos'] = $this->produto_model->show($idproduto);
		$dados['titulo'] = 'Editar Produto';
		$dados['nome'] = 'Editar Produto';
		$this->load->view('form-produtos', $dados);

	}

	public function update($idproduto){

		$this->load->model('produto_model');
		$produtos = $_POST;
		$this->produto_model->update($idproduto, $produtos);
		redirect('produto');
	}

}