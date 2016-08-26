<div class="title admin_t">Редактирование отзыва</div>
<div class="model_info">
<?php
echo $this->Form->create('Review');
echo $this->Form->input('title', array('label' => 'ФИО', 'class' => 'admin_input_f model fl_r'));
echo $this->Form->input('body', array('label' => 'Текст отзыва', 'id' => 'editor'));
echo $this->Form->input('website', array('label' => 'Ссылка', 'class' => 'admin_input_f model fl_r'));
echo $this->Form->input('active', array('label' => 'Активность', 'class' => 'admin_input_f model fl_r', 'type' => 'checkbox' ));
?>
</div>
	<?
	echo $this->Form->end('Редактировать');
	?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>