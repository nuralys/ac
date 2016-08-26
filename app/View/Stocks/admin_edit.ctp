<div class="title admin_t">Редактирование материала</div>

<div class="model_info">
<?php 

echo $this->Form->create('Partner', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('body', array('label' => '', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => '', 'type' => 'file')); 
echo $this->Form->input('keywords', array('label' => 'Ключевые слова(для поисковиков):'));
echo $this->Form->input('description', array('label' => 'Описание(для поисковиков):'));

?>
</div>
	<?
	echo $this->Form->end('Редактировать');
	?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>