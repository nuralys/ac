<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{

	public $validate = array(
		
		'password' =>  array(
	        'length' => array(
	            'rule'      => array('between', 8, 40),
	            'message'   => 'Your password must be between 8 and 40 characters.',
	            'on'        => 'create',  // we only need this validation on create
	        ),
	    ),
	    'password_repeat' => array(
	        'compare' => array(
	            'rule'    => array('validate_passwords'),
	            'message' => 'Please confirm the password',
	        ),
	    ),
	);

	public function validate_passwords() { //password match check
	    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_repeat'];
	}

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}
}