<div class="title admin_t">
		<h2>Редактирование материала</h2>
	</div>
<?php 

// debug($c_list);
echo $this->Form->create('Portfolio', array('type' => 'file'));?>

<?php
echo $this->Form->input('title', array('label' => 'Название'));
?>
<div class="input select">
	<label for="PortfolioServiceId">Услуги:</label>
	<select name="data[Portfolio][service_id]" id="PortfolioServiceId">
		<option value="0">-</option>
		<?php foreach($services as $k => $v):?>
			<option <?php if($k == $data['Portfolio']['service_id']) echo ' selected'; ?> value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('body', array('label' => 'Описание', 'id' => 'editor'));

echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('site_desc', array('label' => 'Краткое описание:'));

echo $this->Form->input('link', array('label' => 'Ссылка', 'placeholder' => 'Ссылка'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => 'meta Описание', 'placeholder' => 'Описание '));
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>