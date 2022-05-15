<?php

class Fornecedor_model extends CI_Model {
	
	public function index(){

		$this->db->order_by("nome", "ASC");
		// $this->db->limit(10);
		return $this->db->get('fornecedor')->result_array();
	}

	public function store($fornecedor){

		$this->db->insert('fornecedor', $fornecedor);
	}

	public function show($idfornecedor){

		return $this->db->get_where('fornecedor', array('idfornecedor' => $idfornecedor))->row_array();

	}

	public function update($idfornecedor, $fornecedores){

		$this->db->where('idfornecedor', $idfornecedor);
		return $this->db->update('fornecedor', $fornecedores);
	}

	// public function destroy($codigo){

	// 	$this->db->where('codigo', $codigo);
	// 	return $this->db->delete('sistema');
	// }

	public function verificaCnpj($cnpj){

		$this->db->where('cnpj',$cnpj);
		return $this->db->get('fornecedor')->row_array();
	}

	// public function getSistema($codigo){

	// 	$this->db->where("codigo", $codigo);
	// 	return $this->db->get('sistema')->result_array();
	// }

	// public function map(){

		
	// 	return $this->db->get('sistema')->result_array();
	// }
}