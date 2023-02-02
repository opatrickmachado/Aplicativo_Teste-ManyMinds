<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Colaboradores extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('colaboradores_model', 'colaboradores');
	}

	public function index()
	{
		$this->load->view('painel/home');
	}

	public function cadastrar()
	{

		verificalogin();

		$this->form_validation->set_rules('colaborador', 'Colaborador', 'trim|required');
		$this->form_validation->set_rules('fornecedor', 'Fornecedor', 'required');
		$this->form_validation->set_rules('valido', 'Valido', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
		$this->form_validation->set_rules('estado', 'Estado', 'trim|required');
		$this->form_validation->set_rules('Celular', 'Celular', 'trim|required');

		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->post();

			$dados_insert['nomeColaborador'] = $dados_form['colaborador'];
			$dados_insert['fornecedor'] = $dados_form['fornecedor'];
			$dados_insert['valido'] = $dados_form['valido'];
			$dados_insert['email'] = $dados_form['email'];
			$dados_insert['cidade'] = $dados_form['cidade'];
			$dados_insert['estado'] = $dados_form['estado'];
			$dados_insert['celular'] = $dados_form['celular'];

			if ($id = $this->colaboradores->inserir($dados_insert)) {
				set_msg('Oba, Colaborador Cadastrado com Sucesso!');

			} else {
				set_msg('Vish, Sinto Muito pelo ERRO!');
			}

		}

		$dados['titulo'] = 'Cadastro de Colaborador - ManyMinds';

		$this->load->view('painel/cadastro', $dados);
	}

	public function editar()
	{

		verificalogin();

		$id = $this->uri->segment(2);
		if ($id > 0) {

			if ($colaboradores = $this->colaboradores->selectOne($id)) {
				$dados['colaboradores'] = $colaboradores;
				$dados_update['id'] = $colaboradores->id;

			} else {
				set_msg("Desculpe, mas esse id do colaborador não existe!");
				redirect(base_url(), 'refresh');

			}
		} else {
			set_msg('Por favor, poderia tentar novamente?');
			redirect(base_url(), 'refresh');

		}

		$this->form_validation->set_rules('colaborador', 'Colaborador', 'trim|required');
		$this->form_validation->set_rules('fornecedor', 'Fornecedor', 'required');
		$this->form_validation->set_rules('valido', 'Valido', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
		$this->form_validation->set_rules('estado', 'Estado', 'trim|required');
		$this->form_validation->set_rules('celular', 'celular', 'trim|required');

		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->post();

			$dados_update['nomeColaborador'] = $dados_form['colaborador'];
			$dados_update['fornecedor'] = $dados_form['fornecedor'];
			$dados_update['valido'] = $dados_form['valido'];
			$dados_update['email'] = $dados_form['email'];
			$dados_update['cidade'] = $dados_form['cidade'];
			$dados_update['estado'] = $dados_form['estado'];
			$dados_update['celular'] = $dados_form['celular'];

			if ($linha = $this->colaboradores->editar($dados_update)) {
				redirect(base_url(), 'refresh');
			} else if ($linha == 0) {
				set_msg("Ops, certeza que você fez alguma alteração?");
			} else {
				set_msg("Putz, encontramos uma falha ao atualizar.");
			}
		}

		$dados['titulo'] = 'Editar Colaborador - ManyMinds';

		$this->load->view('painel/editar', $dados);
	}


	public function verificacaoColaboradores()
	{

		verificalogin();

		$id = $this->uri->segment(2);
		if ($id > 0) {

			if ($colaboradores = $this->colaboradores->selectOne($id)) {
				$dados_update['id'] = $colaboradores->id;
				$dados_update['nomeColaborador'] = $colaboradores->nomeColaborador;
				$valido = $colaboradores->valido;
			} else {
				echo 'Desculpe, mas esse id do produto não existe!';
			}

		} else {
			echo 'Por favor, poderia tentar novamente?';
		}

		if ($valido == 0) {
			$dados_update['valido'] = 1;

			if ($linha = $this->colaboradores->editar($dados_update)) {
				set_msg('Colaborador ' . $dados_update['nomeColaborador'] . ' invalido');
				redirect(base_url(), 'refresh');
			} else {
				set_msg('Putz, não foi possível alterar!');
			}
		} else {
			$dados_update['valido'] = 0;

			if ($linha = $this->colaboradores->editar($dados_update)) {
				set_msg('Colaborador ' . $dados_update['nomeColaborador'] . ' invalido');
				redirect(base_url(), 'refresh');
			} else {
				set_msg('Putz, não foi possível alterar!');
			}
		}
	}
}