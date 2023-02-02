<?php 

	$this->load->view('topo');

?>
	<div class="margin">
		<h1 class="alinhamento">Produtos</h1>
		
		<a href="<?php echo base_url('index.php/cadastroProdutos')?>">Novo Produto</a>

		<?php

			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}
			
			if(isset($produtos) && sizeof($produtos) > 0){
		?>

			<?php
				foreach ($produtos as $key => $value) {
					
			?>

					<?php 
						if($value->valido == 0){
					?>
							<p><?php echo $value->produto;?> (invalido)</p>
							<a href="<?php echo base_url('index.php/verificacaoProdutos/' . $value->id);?>">Reativar</a>
							<hr>

					<?php
						}else{
					?>
							<p><?php echo $value->produto;?></p>
							<a href="<?php echo base_url('index.php/editarProdutos/' . $value->id);?>">Editar</a>
							<a href="<?php echo base_url('index.php/verificacaoProdutos/' . $value->id);?>">Inativar</a>
							<hr>

					<?php } ?>

			<?php } ?>

		<?php }else{
				echo 'Nenhum produto!';
		}?>
	</div>
<?php
	
	$this->load->view('rodape');

?>