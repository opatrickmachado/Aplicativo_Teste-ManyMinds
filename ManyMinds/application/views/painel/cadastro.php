<?php 

	$this->load->view('topo');

?>

	<div class="margin alinhamento">
		<h1 class="alinhamento">Novo Colaborador</h1>

		<?php

			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}
			
			echo form_open();

			echo '<p>' . form_label('Nome do Colaborador:','colaborador') . '</p>';
			echo form_input('colaborador','',array('class' => 'campo'));

			echo '<p>' . form_label('É fornecedor:') . '</p>';
			echo form_radio('fornecedor',0);
			echo form_label('Não');
			echo form_radio('fornecedor',1);
			echo form_label('Sim');

			echo '<p>' . form_label('Está valido:') . '</p>';
			echo form_radio('valido',0);
			echo form_label('Não');
			echo form_radio('valido',1);
			echo form_label('Sim');

			echo '<p>' . form_label('E-mail:') . '</p>';
			echo form_input('email','',array('class' => 'campo'));

			echo '<p>' . form_label('Cidade:') . '</p>';
			echo form_input('cidade','',array('class' => 'campo'));

			echo '<p>' . form_label('Estado:') . '</p>';
			echo form_input('estado','',array('class' => 'campo'));

			echo '<p>' . form_label('Celular:') . '</p>';
			echo form_input('celular','',array('class' => 'campo')) . '</br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();
		?>
	</div>

<?php

	$this->load->view('rodape');

?>