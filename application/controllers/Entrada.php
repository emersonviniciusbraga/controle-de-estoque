<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

	public function __construct(){

		parent::__construct();
		// permission();
		
		
	}
	
	public function index() {

		$this->load->model('item_model');
		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');
		$dados['itens'] = $this->item_model->index();
		$dados['produtos'] = $this->produto_model->index();	
		$dados['fornecedores'] = $this->fornecedor_model->index();	
		$dados['titulo'] = 'Estoque';
		$this->load->view('Itens', $dados);
		

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

		$dados['titulo'] = 'Entrada de Mercadoria';
		$dados['nome'] = 'Entrada de Mercadoria';$this->load->model('item_model');
		$dados['produtos'] = $this->produto_model->index();	
		$dados['fornecedores'] = $this->fornecedor_model->index();
		$this->load->view('form-itens', $dados);
	}

	public function store(){

		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');
		
		$item = $_POST;

		$item['qtd_despachada'] == '0';


		$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/estoque/nf/';
		$extensao = strtolower(substr($_FILES['nf']['name'], -4));
		$novo_nome = md5(time()) . $extensao;
		$diretorio = $SERVERFILEPATH;	
		move_uploaded_file($_FILES['nf']['tmp_name'], $diretorio.$novo_nome);
		

		$item['nf'] = $novo_nome;
		$item['usuario_idusuario'] = '1';

		$this->load->model('item_model');
		
		if(!$this->item_model->store($item)){
			
			$this->session->set_flashdata('sucesso', 'Cadastrado com sucesso!');
			redirect('entrada');
		}else{
			$this->session->set_flashdata('error', 'Error ao cadastrar, Nome do item já cadastrado!');
			redirect('entrada/new');
		}
	}

	public function edit($iditem) {

		$this->load->model('item_model');
		$dados['itens'] = $this->item_model->show($iditem);
		$dados['titulo'] = 'Editar Item';
		$dados['nome'] = 'Editar Item';
		$this->load->view('form-itens', $dados);

	}

	public function update($iditem){

		$this->load->model('item_model');
		$itens = $_POST;
		$this->item_model->update($iditem, $itens);
		redirect('entrada');
	}

	public function pdf(){
		$this->load->model('item_model');
		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');
		$dados['itens'] = $this->item_model->index();
		$dados['produtos'] = $this->produto_model->index();	
		$dados['fornecedores'] = $this->fornecedor_model->index();	
		$dados['titulo'] = 'Estoque';
		$this->load->view('relatorio', $dados);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("relatorio.pdf", array("Attachment"=>0));
	}
}