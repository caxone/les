<header>
	<h2>Relatório de Chamados</h2>
</header>
<table id="consult" class="table table-striped">
	<thead>
		<tr>
			<th><?php echo 'Tipo';?></th>
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
			<td><?php echo $call['Type']['type_name'];?></td>
			<td class="center"><?php echo $call['0']['quantidade'];?></td>
	  	</tr>
	  	<?php 
		  		$cont++;
		  	endforeach;
		  	unset($result);

	  	?>
	</tbody>
</table>