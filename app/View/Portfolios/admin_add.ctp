<div class="title admin_t">
		<h2>Добавление новой работы</h2>
	</div>
<?php 

echo $this->Form->create('Portfolio', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
echo $this->Form->input('site_desc', array('label' => 'Короткое описание', 'class' => 'admin_input_f model '));
echo $this->Form->input('link', array('label' => 'Ссылка', 'class' => 'admin_input_f model '));
echo $this->Form->input('body', array('label' => '', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => '', 'class' => 'admin_input_f model ', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => '', 'class' => 'admin_input_f model ','placeholder' => 'Описание '));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>