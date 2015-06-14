<div class="calls view">
<h2><?php  echo __('Call'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($call['Call']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($call['Call']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($call['Call']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Closed'); ?></dt>
		<dd>
			<?php echo h($call['Call']['closed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($call['Call']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($call['User']['name'], array('controller' => 'users', 'action' => 'view', $call['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($call['Type']['id'], array('controller' => 'types', 'action' => 'view', $call['Type']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

