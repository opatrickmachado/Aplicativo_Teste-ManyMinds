<?php 

	$this->load->view('topo');

?>

	
	<div class="margin">
		<h1 class="alinhamento">Cadastro de Usuário</h1>

		<?php

			if($msg = get_msg()){
				echo '<p>' . $msg .'<p>';
			}

			echo form_open();

			echo '<p>' . form_label('Nome do usuário:','usuario') . '<p>';
			echo form_input('usuario','',array('class' => 'campo')) . '<br>';

			echo '<p>' . form_label('Senha:','senha') . '<p>';
			echo form_input('senha','',array('class' => 'campo')) . '<br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();
		?>
	</div>

<?php

	$this->load->view('rodape');

?>