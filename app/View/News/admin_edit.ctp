<div class="title admin_t">Редактирование новости</div>

<div class="model_info">
<?php 
echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название', 'class' => ''));
echo $this->Form->input('alias', array('label' => 'URI', 'class' => ''));
echo $this->Form->input('img', array('label' => '', 'type' => 'file'));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('date', array('label' => 'Дата:',));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова(для поисковиков):', 'class' => ''));
echo $this->Form->input('description', array('label' => 'Описание(для поисковиков):', 'class' => ''));
?>
</div>
<?
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>