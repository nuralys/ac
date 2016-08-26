<div class="title admin_t">
		<h2>Редактирование материала</h2>
	</div>
<?php 

// debug($c_list);
echo $this->Form->create('Service', array('type' => 'file'));?>

<?php
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
?>
<div class="input select">
	<label for="ServiceParentId">Услуги:</label>
	<select name="data[Service][parent_id]" id="ServiceParentId">
		<option value="0">-</option>
		<?php foreach($c_list as $k => $v):?>
			<option <?php if($k == $data['Service']['parent_id']) echo ' selected'; ?> value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('body', array('label' => 'Описание', 'id' => 'editor'));

echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));

echo $this->Form->input('keywords', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => '', 'class' => 'admin_input_f','placeholder' => 'Описание '));
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>