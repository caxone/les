<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Adicinar Usuário'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('mail');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('user_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
