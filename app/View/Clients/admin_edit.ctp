<div class="title admin_t">Редактирование</div>
<div class="model_info">
<?php
echo $this->Form->create('Client', array('type' => 'file'));
echo $this->Form->input('img', array('label' => '', 'type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model fl_r'));
?>
</div>
<?
echo $this->Form->end('Редактировать');
?>