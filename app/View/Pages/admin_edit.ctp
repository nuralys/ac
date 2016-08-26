<div class="title admin_t">Редактирование страницы</div>
<div class="model_info">
<?php 

echo $this->Form->create('Page', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('body', array('label' => '', 'id' => 'editor'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова'));
echo $this->Form->input('description', array('label' => 'Мета описание'));

?>
</div>
	<?
	echo $this->Form->end('Редактировать');
	?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>