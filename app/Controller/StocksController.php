<?php

class StocksController extends AppController{

	// public $uses = array('Stock');

	public function index(){
		
		$data = $this->Stock->find('all');
		$title_for_layout = 'Акции';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Stock->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Stock->findById($id);
		$title_for_layout = $data['Stock']['title'];
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$data = $this->Stock->find('all');
		$title_for_layout = 'Партнеры';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Stock->create();
			$data = $this->request->data['Stock'];
			// debug($this->request->data);
			// debug($data);

			if($this->Stock->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Add new Stock';
		$this->set(compact('title_for_layout'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Stock->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Stock->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Stock->id = $id;
			$data1 = $this->request->data['Stock'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Stock->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Editing material';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function admin_delete($id){
		if (!$this->Stock->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Stock->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}