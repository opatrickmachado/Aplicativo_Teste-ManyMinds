<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titulo; ?></title>
		<meta content-type='text/html' charset="utf-8">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">

	</head>
	<body>

	<ul>
		<li><a href="<?php echo base_url();?>">Home</a></li>

		<?php
			//se logado é usuario adm
			$info = & get_instance();
			if($info->session->userdata('logged') == true && $info->session->userdata('user_login') == 'adm'){	
		?>
				<li><a href="<?php echo base_url('index.php/produtos');?>">Produtos</a></li>
				<li><a href="<?php echo base_url('index.php/cadUsuario');?>">Usuarios</a></li>
		<?php } ?>

		<li><a href="<?php echo base_url('index.php/sobre');?>">Sobre</a></li>
		<li style="float: right;"><a href="<?php echo base_url('index.php/logout');?>">Sair</a></li>
	</ul>
	