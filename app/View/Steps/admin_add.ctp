<div class="title admin_t">
		<h2>Добавление шага</h2>
	</div>
<?php 

echo $this->Form->create('Step', array('type' => 'file'));?>
<div class="input select">
	<label for="StepServiceId">Услуга:</label>
	<select name="data[Step][service_id]" id="StepServiceId">
		<option value="0">-</option>
		<?php foreach($services as $k => $v):?>
			<option value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('body', array('label' => 'Текст'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>