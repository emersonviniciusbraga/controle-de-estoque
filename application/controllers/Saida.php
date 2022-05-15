<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saida extends CI_Controller {


	public function index() {

		$this->load->model('item_model');
		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');
		$dados['itens'] = $this->item_model->index();
		$dados['produtos'] = $this->produto_model->index();	
		$dados['fornecedores'] = $this->fornecedor_model->index();	
		$dados['titulo'] = 'Saída de Mercadoria';
		$this->load->view('saida', $dados);
		

	}

	public function pesquisar() {

		$this->load->model('busca_model');	
		$dados['titulo'] = 'Resultado da Pesquisa por *'.$_POST['busca'].'*';
		$dados['resultado'] = $this->busca_model->buscarItens($_POST);
		$this->load->view('resultado-itens', $dados);

	}

	public function new(){

		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');

		$dados['titulo'] = 'Saída de Mercadoria';
		$dados['nome'] = 'Saída de Mercadoria';$this->load->model('item_model');
		$dados['produtos'] = $this->produto_model->index();	
		$dados['fornecedores'] = $this->fornecedor_model->index();
		$this->load->view('form-saida', $dados);
	}

	public function edit($iditem) {

		$this->load->model('item_model');
		$dados['itens'] = $this->item_model->show($iditem);
		$dados['titulo'] = 'Editar Item';
		$dados['nome'] = 'Editar Item';
		$this->load->view('form-saida', $dados);

	}

	public function update($iditem){

		$this->load->model('item_model');
		
		$itens = $_POST;
		$q = $_POST['qtd'];
		$d = $_POST['qtd_despachada'];
		
		$itens['qtd_despachada'] = $d++;

		$this->item_model->update($iditem, $itens);
		redirect('saldo');
	}


}