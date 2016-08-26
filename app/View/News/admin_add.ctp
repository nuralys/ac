<div class="title admin_t">
		<h2>Добавление новости</h2>
	</div>
<?php 

echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('alias', array('label' => 'URI'));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова ', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => 'Описание','placeholder' => 'Описание '));
echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>