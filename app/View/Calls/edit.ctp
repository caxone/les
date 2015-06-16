<div class="calls form">
<?php echo $this->Form->create('Call', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Edit Call'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nome','class'=>'form-control'));
		echo $this->Form->input('description', array('label'=>'Descrição','class'=>'form-control'));
		echo $this->Form->input('user_id');
		echo $this->Form->input('type_id', array('label'=>'Tipo','class'=>'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit',array('class'=>'btn btn-default'))); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete','class'=>'btn btn-default', $this->Form->value('Call.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Call.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index','class'=>'btn btn-default')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add','class'=>'btn btn-default')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index','class'=>'btn btn-default')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add','class'=>'btn btn-default')); ?> </li>
	</ul>
</div>
