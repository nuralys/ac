<h1>Список заказов</h1>
<?php //debug($categories)?>
 <?php if(!empty($data)): ?>
<table>
	<tr>
			<th>ID</th>
			<th>ФИО</th>
			<th>E-mail</th>	
			<th>Телефон</th>	
			<th>Название</th>
			<th>ID продукта</th>
			<th>Категория</th>
			<th>Цена</th>
			<th>Количество</th>
			<th>Тип</th>
			<th>Время создания заказа</th>	
			<th>Действия</th>	
		</tr>


 	<?php foreach($data as $item): ?>
 	<tr>
 		<td><?=$item['Basket']['id']?></td>
 		<td><?=$item['Basket']['fio']?></td>
 		<td><?=$item['Basket']['email']?></td>
 		<td><?=$item['Basket']['phone']?></td>
 		<td><?=$item['Basket']['title']?></td>
 		<td><?=$item['Basket']['product_id']?></td>
 		<td>
 		<?php foreach($categories as $key => $value): ?>
 			<?php if($key == $item['Basket']['category_id']): ?>
 				<?=$value?>
		 	<?php endif ?>
		 <?php endforeach ?>
 			
 		</td>
 		<td><?=$item['Basket']['price']?></td>
 		<td><?=$item['Basket']['count']?></td>
 		<td><?=$item['Basket']['type']?></td>
 		<td><?=$item['Basket']['created']?></td>
 		<td><a href="/admin/baskets/edit/<?=$item['Basket']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Basket']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>