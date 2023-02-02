<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagina extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('colaboradores_model', 'colaboradores');
	}

	public function index()
	{
		$dados['titulo'] = 'ManyMinds';

		$dados['colaboradores'] = $this->colaboradores->selectAll();

		$this->load->view('painel/home', $dados);
	}


	public function sobre()
	{
		$dados['titulo'] = 'Sobre - ManyMinds';

		$this->load->view('sobre', $dados);
	}

	public function post()
	{

		$id = $this->uri->segment(2);
		if ($id > 0) {
			if ($colaboradores = $this->colaboradores->selectOne($id)) {
				$dados['colaboradores'] = $colaboradores;
			} else {
				$dados['colaboradores'] = 'Não localizado';
			}

		} else {
			redirect(base_url(), 'refresh');
		}

		$dados['titulo'] = 'Colaboradores';

		$this->load->view('post', $dados);
	}

	public function teste()
	{
		$dados['titulo'] = 'Sobre - ManyMinds';

		$this->load->view('sobre', $dados);
	}
}