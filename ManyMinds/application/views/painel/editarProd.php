<?php 

	$this->load->view('topo');

?>
	<div class="margin">
	<h1 class="alinhamento">Tela de Cadastro de Produtos</h1>

	<?php

		if($msg = get_msg()){
			echo '<p>' . $msg .'</p>';
		}
		
		echo form_open();

		echo '<p>' . form_label('Nome do produto:','produto') . '<p>';
		echo form_input('produto',$produto->produto,array('class' => 'campo')) . '<br>';

		echo '<p>' . form_label('Nome do colaborador','colaborador') . '<p>';
		echo form_input('colaborador',$produto->colaborador,array('class' => 'campo')) . '<br>';

		echo '<p>' . form_label('Está valido:') . '<p>';
		if($produto->valido == 0){
			echo form_radio('valido',0,'checked') . 'Não';
			echo form_radio('valido',1) . 'Sim<br>';
		}else{
			echo form_radio('valido',0) . 'Não';
			echo form_radio('valido',1,'checked') . 'Sim<br>';
		}

		echo form_submit('enviar','Salvar',array('class' => 'botao'));
		echo form_close();
	?>
	</div>
<?php

	$this->load->view('rodape');

?>