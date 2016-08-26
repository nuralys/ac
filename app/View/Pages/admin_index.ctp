<table>
<th>Название</th><th>Действие</th>
	<?php foreach($data as $item): ?>
		<tr>
		<td><?=$item['Page']['title']?> </td>
			<td><a href="/admin/pages/edit/<?=$item['Page']['id']?>">Редактировать</a> </td> 
		
		</tr>
		
	<?php endforeach ?>
</table>