<div class="calls index">
	<h2><?php echo __('Chamados'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Abertura'); ?></th>
			<th><?php echo $this->Paginator->sort('closed','Atendido'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Atendente'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id', 'Tipo'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($calls as $call): ?>
	<tr>
		<td><?php echo h($call['Call']['id']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['name']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['created']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['closed']); ?>&nbsp;</td>
		<td><?php echo h($call['Call']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($call['User']['name'], array('controller' => 'users', 'action' => 'view', $call['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($call['Type']['type_name'], array('controller' => 'types', 'action' => 'view', $call['Type']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $call['Call']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $call['Call']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $call['Call']['id']), null, __('Are you sure you want to delete # %s?', $call['Call']['id'])); ?>
			<?php echo $this->Html->link(__('fechar'), array('action' => 'close', $call['Call']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

