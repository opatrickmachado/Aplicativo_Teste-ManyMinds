<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('produtos_model', 'produtos');
	}

	public function index()
	{

		verificalogin();

		$dados['titulo'] = 'Produtos - ManyMinds';

		$dados['produtos'] = $this->produtos->selectAll();

		$this->load->view('painel/home_produtos', $dados);
	}


	public function cadastrar()
	{

		verificalogin();

		$this->form_validation->set_rules('produto', 'Produto', 'trim|required');
		$this->form_validation->set_rules('colaborador', 'Colaborador', 'trim|required');
		$this->form_validation->set_rules('valido', 'valido', 'trim|required');

		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}
		} else {

			$dados_form = $this->input->post();

			$dados_insert['produto'] = $dados_form['produto'];
			$dados_insert['colaborador'] = $dados_form['colaborador'];
			$dados_insert['valido'] = $dados_form['valido'];

			if ($id = $this->produtos->inserir($dados_insert)) {
				set_msg('Oba, Tivemos Sucesso ao salvar!');
			} else {
				set_msg('Infelizmente não foi possível salvar este produto!');
			}
		}

		$dados['titulo'] = 'Cadastro de Produtos';

		$this->load->view('painel/cadastroProd', $dados);
	}

	public function editar()
	{

		verificalogin();

		$id = $this->uri->segment(2);
		if ($id > 0) {

			if ($produtos = $this->produtos->selectOne($id)) {
				$dados['produto'] = $produtos;
				$dados_update['id'] = $produtos->id;

			} else {
				set_msg('Desculpe, mas esse id do produto não existe!');
			}
		} else {
			set_msg('Por favor, poderia tentar novamente?');
		}

		$this->form_validation->set_rules('produto', 'Produto', 'trim|required');
		$this->form_validation->set_rules('colaborador', 'Colaborador', 'trim|required');
		$this->form_validation->set_rules('valido', 'valido', 'required');

		if ($this->form_validation->run() == False) {
			if (validation_errors()) {
				set_msg(validation_errors());
			}
		} else {

			$dados_form = $this->input->post();

			$dados_update['produto'] = $dados_form['produto'];
			$dados_update['colaborador'] = $dados_form['colaborador'];
			$dados_update['valido'] = $dados_form['valido'];

			if ($linha = $this->produtos->editar($dados_update)) {
				set_msg('Perfeito, Seu Produto editado com sucesso!');
				redirect('produtos', 'refresh');
			} else if ($linha == 0) {
				set_msg('Ops, certeza que você fez alguma alteração?');
			} else {
				set_msg('Putz, encontramos uma falha ao atualizar.');
			}
		}

		$dados['titulo'] = 'Editar Produtos';

		$this->load->view('painel/editarProd', $dados);
	}

	public function verificacaoProdutos()
	{

		verificalogin();

		$id = $this->uri->segment(2);
		if ($id > 0) {

			if ($produto = $this->produtos->selectOne($id)) {
				$dados_update['id'] = $produto->id;
				$dados_update['produto'] = $produto->produto;
				$valido = $produto->valido;

			} else {
				echo 'Desculpe, mas esse id do produto não existe!';
			}

		} else {
			echo 'Por favor, poderia tentar novamente?';
		}

		if ($valido == 0) {
			$dados_update['valido'] = 1;

			if ($linha = $this->produtos->editar($dados_update)) {
				set_msg('Produto ' . $dados_update['produto'] . ' invalido');
				redirect('produtos', 'refresh');
			} else {
				set_msg('Putz, encontramos uma falha ao atualizar.');
			}
		} else {
			$dados_update['valido'] = 0;

			if ($linha = $this->produtos->editar($dados_update)) {
				set_msg('Produto ' . $dados_update['produto'] . ' invalido');
				redirect('produtos', 'refresh');
			} else {
				set_msg('Putz, encontramos uma falha ao atualizar.');
			}
		}
	}
}