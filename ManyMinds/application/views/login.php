<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titulo; ?></title>
		<meta content-type='text/html' charset="utf-8">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">

	</head>
	<body>
	
	<div class="alinhamento">
		<h1>Login</h1>

		<?php
			
			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}

			echo form_open();
			
			echo form_label('Nome de usuario','usuario') . '<br>';
			echo form_input('usuario','',array('class' => 'campo')) . '<br>';

			echo form_label('Senha','senha') . '<br>';
			echo form_password('senha','',array('class' => 'campo')) . '<br>';

			echo form_submit('enviar','Entrar',array('class' => 'botao'));
			echo form_close();
		?>
		<span>Obs: Caso você não tiver nenhum usuário cadastrado, é preciso solicitar o cadastro ao Administrador.</span>
	</div>

<?php
	
	$this->load->view('rodape');

?>