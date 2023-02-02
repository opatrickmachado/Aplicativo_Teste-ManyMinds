<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usuario_model', 'usuario');
	}

	public function index()
	{
		$this->load->view('sobre');
	}

	public function cadastrar()
	{

		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[5]');

		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->post();

			$dados_insert['usuario'] = $dados_form['usuario'];
			$dados_insert['senha'] = $dados_form['senha'];

			if ($this->usuario->inserir($dados_insert)) {
				set_msg('Usuario salvo com sucesso!!');
			} else {
				set_msg('Falha ao salvar o usuario');
			}
		}

		$dados['titulo'] = 'Cadastro Usuario - Manyminds';

		$this->load->view('painel/cadastroUsuario', $dados);
	}
}