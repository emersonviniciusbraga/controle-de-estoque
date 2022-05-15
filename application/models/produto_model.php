<?php

class Produto_model extends CI_Model {
	
	public function index(){

		$this->db->order_by("nome", "ASC");
		// $this->db->limit(10);
		return $this->db->get('produto')->result_array();
	}

	public function store($produto){

		$this->db->insert('produto', $produto);
	}

	public function show($idproduto){

		return $this->db->get_where('produto', array('idproduto' => $idproduto))->row_array();

	}

	public function update($idproduto, $produtos){

		$this->db->where('idproduto', $idproduto);
		return $this->db->update('produto', $produtos);
	}

	public function verificaNome($nome){

		$this->db->where('nome',$nome);
		return $this->db->get('produto')->row_array();
	}
}