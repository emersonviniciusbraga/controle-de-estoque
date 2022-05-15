
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	
	public function index() {

		return $this->db->get("usuario")->result_array();
	}

	public function store($user){

		$this->db->insert('usuario', $user);
	}

	public function verificaEmail($cpf){

		$this->db->where('cpf',$cpf);
		return $this->db->get('usuario')->row_array();
	}
}