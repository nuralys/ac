<h1>Список материалов</h1>
<a href="/admin/articles/add">Добавить новый материал</a>
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
 		<td><?=$item['Article']['id']?></td>
 		<td><?=$item['Article']['title']?></td>
 		<td><a href="/admin/articles/edit/<?=$item['Article']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Article']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>