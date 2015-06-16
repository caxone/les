<header>
	<h2>Relatório de Usuários</h2>
</header>
<table id="consult" class="table table-striped">
	<thead>
		<tr>
			<th><?php echo 'Nome';?></th>
			<th>Quantidade</th>
		</tr>
	</thead>
	<tbody>
	<?php

	   	$cont=0;
	   	foreach($result as $call):
	   		if ($cont % 2 == 0):
	?>
		<tr>
			<?php else:?>
				<tr >
			<?php endif; ?>
			<td><?php if(!$call['User']['name'])
					echo 'Sem atendimento';
				else
					echo $call['User']['name'];?></td>
			<td class="center"><?php echo $call['0']['quantidade'];?></td>
	  	</tr>
	  	<?php 
		  		$cont++;
		  	endforeach;
		  	unset($result);
		  					$closed = date("d/m/Y H:m:s");
				echo pr ($closed);

	  	?>
	</tbody>
</table>