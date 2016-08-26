<div class="title admin_t">
		<h3>Добавление материала</h3>
	</div>
<?php 
echo $this->Form->create('Stock', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('img', array('label' => 'Изображение', 'type' => 'file'));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова'));
echo $this->Form->input('description', array('label' => 'Описание'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>