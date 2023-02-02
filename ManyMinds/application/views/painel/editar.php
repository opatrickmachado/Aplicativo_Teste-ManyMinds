<?php 

	$this->load->view('topo');

?>
	<div class="margin">
		<h1 class="alinhamento">Atualizar Colaborador</h1>
		<?php

			if($msg = get_msg()){
				echo '<p>' . $msg .'</p>';
			}
			
			echo form_open();
			echo '<p>' . form_label('Nome do colaborador:','colaborador') . '</p>';
			echo form_input('colaborador',$colaboradores->nomeColaborador,array('class' => 'campo'));

			echo '<p>' . form_label('É fornecedor:') . '</p>';

			if($colaboradores->fornecedor == 0){
				echo form_radio('fornecedor',0,'checked');
				echo form_label('Não');
				echo form_radio('fornecedor',1);
				echo form_label('Sim');
			}else{
				echo form_radio('fornecedor',0);
				echo form_label('Não');
				echo form_radio('fornecedor',1,'checked');
				echo form_label('Sim');
			}

			echo '<p>' . form_label('Está valido:') . '</p>';

			if($colaboradores->valido == 0){
				echo form_radio('valido',0,'checked');
				echo form_label('Não');
				echo form_radio('valido',1);
				echo form_label('Sim');
			}else{
				echo form_radio('valido',0);
				echo form_label('Não');
				echo form_radio('valido',1,'checked');
				echo form_label('Sim');
			}

			echo '<p>' . form_label('Informe o seu email:') . '</p>';
			echo form_input('email',$colaboradores->email,array('class' => 'campo'));

			echo '<p>' . form_label('Informe a sua cidade:') . '</p>';
			echo form_input('cidade',$colaboradores->cidade,array('class' => 'campo'));

			echo '<p>' . form_label('Informe o seu estado:') . '</p>';
			echo form_input('estado',$colaboradores->estado,array('class' => 'campo'));

			echo '<p>' . form_label('Informe o seu telefone:') . '</p>';
			echo form_input('telefone',$colaboradores->telefone,array('class' => 'campo')) . '</br>';

			echo form_submit('enviar','Salvar',array('class' => 'botao'));
			echo form_close();
			?>
	</div>

<?php

	$this->load->view('rodape');

?>