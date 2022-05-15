<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard-adm');
	}

	public function Saldo(){
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