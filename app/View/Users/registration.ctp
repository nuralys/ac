<div class="title admin_t">
		<h2>Регистрация</h2>
	</div>
<?php 

echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => 'Логин', 'class' => 'admin_input_f model '));
echo $this->Form->input('password', array('label' => 'Пароль'));
echo $this->Form->end('Зарегистрироваться');
?>
</div>