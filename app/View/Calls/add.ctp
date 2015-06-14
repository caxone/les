<div class="calls form">
<?php echo $this->Form->create('Call', array('class'=>'')); ?>
	<fieldset>
		<legend><?php echo(__('Add Call')); ?></legend>
	<div class="form-group">
		<div class="col-sm-5">
		<?php
			echo $this->Form->input('name', array('label'=>'Nome','class'=>'form-control')); 
		echo $this->Form->input('email', array('label'=>'E-mail','class'=>'form-control'));
		echo $this->Form->input('description', array('label'=>'Descrição','class'=>'form-control'));
		echo $this->Form->input('type_id', array('label'=>'Tipo','class'=>'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit',array('class'=>'btn btn-default'))); ?>
</div>

