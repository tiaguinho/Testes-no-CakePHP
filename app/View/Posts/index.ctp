<h1>Posts</h1>

<table>
	<tr>
		<td>ID</td>
		<td>Título</td>
		<td>Criado</td>
		<td>Modificado</td>
		<td>Ações</td>
	</tr>
	<?	foreach($posts as $post):?>
			<tr>
				<td><?=$post['Post']['id']?></td>
				<td><?=$post['Post']['titulo']?></td>
				<td><?=$post['Post']['created']?></td>
				<td><?=$post['Post']['modified']?></td>
				<td>
					<?=$this->Html->link('Editar',array('controller' => 'posts','action' => 'edit',$post['Post']['id']))?> |
					<?=$this->Html->link('Deletar',array('controller' => 'posts','action' => 'delete',$post['Post']['id']),null,'Deseja deletar o post #'.$post['Post']['titulo'].'?')?> |
					<?=$this->Html->link('Visualizar',array('controller' => 'posts','action' => 'view',$post['Post']['id']))?>
				</td>
			</tr>
	<?	endforeach;?>
</table>