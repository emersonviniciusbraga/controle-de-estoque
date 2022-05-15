<?php

class Busca_model extends CI_Model {

    public function buscarFornecedores($busca){
        if(empty($busca)){
            return array();
        }

        $busca = $this->input->post("busca");
        $this->db->like("cnpj", $busca);
        return $this->db->get("fornecedor")->result_array();
    }

    public function buscarItens($busca){
        if(empty($busca)){
            return array();
        }

        $busca = $this->input->post("busca");
        $this->db->like("nome", $busca);
        return $this->db->get("produto")->result_array();
    }

    public function buscarProdutos($busca){
        if(empty($busca)){
            return array();
        }

        $busca = $this->input->post("busca");
        $this->db->like("nome", $busca);
        return $this->db->get("produto")->result_array();
    }

}