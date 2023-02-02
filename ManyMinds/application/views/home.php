<?php 

	$this->load->view('topo');

?>

	<h1>Home</h1>

	<h3>Colaboradores</h3>

	<?php
		
		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}

		
		if(isset($colaboradores) && sizeof($colaboradores) > 0){
	?>

		<?php
			
			foreach ($colaboradores as $key => $value) {
		?>

				<?php
					if($value->valido == 0){
				?>

					<p><?php echo $value->nomeColaborador ?></p>
					<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Ver</a>
					<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Reativar</a>
					<hr>

				<?php
					}else{
				?>

					<p><?php echo $value->nomeColaborador ?></p>
					<a href="<?php echo base_url('index.php/editar/'.$value->id);?>">Editar</a>
					<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Ver</a>
					<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Invalidar</a>
					<hr>

				<?php } ?>


		<?php } ?>

	<?php }else{
			echo 'Nenhum colaborador!';
	} ?>


<?php
	
	$this->load->view('rodape');

?>