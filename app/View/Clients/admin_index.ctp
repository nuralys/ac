<h1>Список материалов</h1>
<a href="/admin/clients/add">Добавить новый материал</a>
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
 		<td><?=$item['Client']['id']?></td>
 		<td><?=$item['Client']['title']?></td>
 		<td><a href="/admin/clients/edit/<?=$item['Client']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Client']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>