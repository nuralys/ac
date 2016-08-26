<h1>Список акции и новостей</h1>
<a href="/admin/stocks/add">Добавить новый материал</a>
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
 		<td><?=$item['Stock']['id']?></td>
 		<td><?=$item['Stock']['title']?></td>
 		<td><a href="/admin/stocks/edit/<?=$item['Stock']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Stock']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<h3>К сожалению в данном разделе еще не добавлена информация...</h3>
<?php endif ?>