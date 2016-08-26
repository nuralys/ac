<div class="title admin_t">
	<h2>Редактирование материала</h2>
</div>
<?php 
echo $this->Form->create('Step', array('type' => 'file'));?>
<?php
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
?>
<div class="input select">
	<label for="StepServiceId">Услуги:</label>
	<select name="data[Step][service_id]" id="StepServiceId">
		<option value="0">-</option>
		<?php foreach($services as $k => $v):?>
			<option <?php if($k == $data['Step']['service_id']) echo ' selected'; ?> value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('body', array('label' => 'Описание', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Редактировать');
?>