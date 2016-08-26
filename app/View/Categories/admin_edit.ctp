<div class="title admin_t">
		<h2>Редактирование</h2>
	</div>
<?php 

// debug($c_list);
echo $this->Form->create('Category', array('type' => 'file'));?>
<div class="input select">
	<label for="CategoryParentId">Категория:</label>
	<select name="data[Category][parent_id]" id="CategoryParentId">
		<option value="0">-</option>
		<?php foreach($c_list as $k => $v):?>
			<option <?php if($k == $data['Category']['parent_id']) echo ' selected'; ?> value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>

<?php
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>