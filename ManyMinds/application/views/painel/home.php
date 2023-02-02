<?php

	$info = & get_instance();
	if($info->session->userdata('logged') != true){
		redirect('setup/login','refresh');	
	}else{
?>

<?php 

	$this->load->view('topo');

?>

	<div class="margin">
		<h1 class="alinhamento">Colaboradores</h1>

		<a href="<?php echo base_url('index.php/cadastro')?>">Novo colaborador</a><br>

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

						<p><?php echo $value->nomeColaborador ?> (invalido)</p>
						<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Informações |</a>
						<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Reativar</a>
						<hr>

					<?php
						}else{
					?>

						<p><?php echo $value->nomeColaborador ?></p>
						<a href="<?php echo base_url('index.php/editar/'.$value->id);?>">Editar |</a>
						<a href="<?php echo base_url('index.php/post/'. $value->id);?>">Informações |</a>
						<a href="<?php echo base_url('index.php/verificacaoColaboradores/'. $value->id);?>">Inativar</a>
						<hr>

					<?php } ?>


			<?php } ?>

		<?php }else{
				echo 'Nenhum colaborador!';
		} ?>

	</div>

<?php
	 }
?>


<?php
	
	$this->load->view('rodape');

?>