<h1>Список услуг</h1>
<a href="/admin/services/add">Добавить новую услугу</a>
<?php //debug($data)?>
 <?php if(!empty($data)): ?>
<table>
	<tr>
			<th>ID</th>
			<th>Название</th>
			<th>Дествия</th>	
		</tr>


 	<?php foreach($data as $item): ?>
 	<tr>
 		<td><?=$item['Service']['id']?></td>
 		<td><?=$item['Service']['title']?></td>
 		<td><a href="/admin/services/edit/<?=$item['Service']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Service']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе нет информации...</p>
<?php endif ?>