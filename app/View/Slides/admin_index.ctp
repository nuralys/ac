<a href="/admin/slides/add">Добавить слайд</a>
<?php //debug($data) ?>
<table>
	<tr>
			<th>Название</th>
			
			<th>Дествия</th>	
		</tr>

	<?php foreach($data as $item): ?>
		<tr>
 		<td><?=$item['Slide']['title']?> </td>
			<td><a href="slides/edit/<?=$item['Slide']['id']?>">Редактировать</a> 
		| <?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Slide']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach ?>
	</table>