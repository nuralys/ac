<div class="title admin_t">
	<h3>Добавление отзыва</h3>
</div>
<?php 
echo $this->Form->create('Review', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>
