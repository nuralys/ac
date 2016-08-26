<h1>Список отзывов</h1>
<a href="/admin/reviews/add">Добавить новый материал</a>
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
 		<td><?=$item['Review']['id']?></td>
 		<td><?=$item['Review']['title']?></td>
 		<td><a href="/admin/reviews/edit/<?=$item['Review']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Review']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>