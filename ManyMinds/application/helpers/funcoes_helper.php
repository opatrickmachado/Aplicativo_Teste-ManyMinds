<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_msg')){
	function set_msg($msg=Null){
		$info = & get_instance();
		$info->session->set_userdata('aviso',$msg);
	}
}

if(!function_exists('get_msg')){
	function get_msg($destroy=True){
		$info = & get_instance();
		$retorno = $info->session->userdata('aviso');
		if($destroy){
			$info->session->unset_userdata('aviso');
		}
		return $retorno;
	}
}

If(!function_exists('verificalogin')){
	function verificalogin($redirect='setup/login'){
		$info = & get_instance();
		if($info->session->userdata('logged') != true){
			set_msg('Ops, Acesso Privado!');
			redirect($redirect,'refresh');
		}
	}
}