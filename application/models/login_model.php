<?php

class Login_model extends CI_Model {
	

	public function store($cpf, $senha){

		$this->db->where('cpf', $cpf);
		$this->db->where('senha', $senha);
		$user = $this->db->get('usuario')->row_array();
		return $user;
	}
}