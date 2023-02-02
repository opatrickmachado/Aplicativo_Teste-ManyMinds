<?php 

	$this->load->view('topo');

?>

	<div class="margin alinhamento">
		<h1>Informações do Colaborador</h1>

		<p>Nome do colaborador: <?php echo $colaboradores->nomeColaborador; ?></p>

		<?php
			if($colaboradores->fornecedor == 0){
		?>
				<p>Está valido: Não</p>

		<?php
			}else{
		?>
				<p>Está valido: Sim</p>
		<?php } ?>

		<?php
			if($colaboradores->valido == 0){
		?>
				<p>Está valido: Não</p>

		<?php
			}else{
		?>
				<p>Está valido: Sim</p>
		<?php } ?>

		<p>Email: <?php echo $colaboradores->email; ?></p>

		<p>Cidade: <?php echo $colaboradores->cidade; ?></p>

		<p>Estado: <?php echo $colaboradores->estado; ?></p>

		<p>Celular: <?php echo $colaboradores->celular; ?></p>

	</div>


<?php

	$this->load->view('rodape');

?>