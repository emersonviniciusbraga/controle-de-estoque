<?php

class Item_model extends CI_Model {
	
	public function index(){

		$this->db->order_by("data_vencimento", "ASC");
		// $this->db->limit(10);
		return $this->db->get('item')->result_array();
	}

	public function store($item){

		$this->db->insert('item', $item);
	}

	public function show($iditem){

		return $this->db->get_where('item', array('iditem' => $iditem))->row_array();

	}

	public function update($iditem, $itens){

		$this->db->where('iditem', $iditem);
		return $this->db->update('item', $itens);
	}

	public function verificaNome($nome){

		$this->db->where('nome',$nome);
		return $this->db->get('item')->row_array();
	}

	public function qtd(){

		return $this->db->get('item')->result_array();
	}
}