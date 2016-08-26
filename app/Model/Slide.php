<?php

class Slide extends AppModel{
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки обработки картинки'
			)
		)
	);

	public function customUploadImg($file = array()){
		/*ws begin*/
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/slider/' . $fileName;
		$path_th = WWW_ROOT . 'img/slider/thumbs/' . $fileName;
		copy($file['img']['tmp_name'], $path);
		copy(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"], '/'), $path_th);
		unlink($file['img']['tmp_name']);
		unlink(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"]));
		/*ws end*/
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/slider/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
}