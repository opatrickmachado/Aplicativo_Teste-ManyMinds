<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usuario_model', 'usuarios');
	}

	public function index()
	{

		$dados['titulo'] = 'ManyMinds';

		$this->load->view('home', $dados);
	}

	public function login()
	{

		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required');


		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}
		} else {

			$dados_form = $this->input->post();

			if ($this->usuarios->findOne($dados_form) == null) {

				set_msg('Desculpe, Mas seu usuário ou senha estão incorretos!');
			} else {

				$this->session->set_userdata('logged', True);
				$this->session->set_userdata('user_login', $dados_form['usuario']);
				redirect(base_url(), 'refresh');
			}

		}


		$dados['titulo'] = 'Login - ManyMinds';

		$this->load->view('login', $dados);
	}


	public function logout()
	{

		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('user_login');
		set_msg('Sentiremos sua falta, até breve!');
		redirect('setup/login', 'refresh');
	}
}