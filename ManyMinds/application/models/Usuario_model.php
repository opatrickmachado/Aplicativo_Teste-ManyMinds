<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function inserir($dados){
		$this->db->insert('usuarios',$dados);
		return true;
	}

	public function findOne($dados){
		$this->db->where('usuario',$dados['usuario']);
		$this->db->where('senha',$dados['senha']);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}
}