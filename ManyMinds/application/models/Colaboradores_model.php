<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function inserir($dados){
		$this->db->insert('colaboradores',$dados);
		return $this->db->insert_id();
	}

	public function editar($dados){

		$this->db->where('id',$dados['id']);

		unset($dados['id']);
		$this->db->update('colaboradores',$dados);
		return $this->db->affected_rows();
	}

	public function selectAll($limit = 0,$offset =0){

		if($limit == 0){
			$this->db->order_by('id','desc');
			$query = $this->db->get('colaboradores');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}
		}
	}

	public function selectOne($id=0){
		$this->db->where('id',$id);
		$query = $this->db->get('colaboradores');
		if($query->num_rows() > 0){
			$linha = $query->row();
			return $linha;
		}else{
			return null;
		}
	}
}